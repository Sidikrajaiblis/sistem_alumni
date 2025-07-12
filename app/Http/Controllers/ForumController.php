<?php

namespace App\Http\Controllers;

use App\Models\forum;
use App\Models\kategori_forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forum = Forum::where('status', 'published')->get();
        return view('admin.forum.index', compact('forum'));
    }

    public function index2()
    {
        $forums = Forum::where('status', 'pending')->with('user', 'kategoriForum')->get();
        return view('moderator.dashboard', compact('forums'));
    }


    public function forum()
    {
        $user = Auth::user();

        // Ambil semua forum user yang login
        $forums = Forum::with('kategoriForum')->where('user_id', $user->id)->latest()->get();

        // Tandai semua notifikasi komentar yang nyangkut ke forum-forum user ini sebagai dibaca
        $forumIds = $forums->pluck('id')->toArray();

        foreach ($user->unreadNotifications as $notif) {
            if (
                isset($notif->data['forum_id']) &&
                in_array($notif->data['forum_id'], $forumIds)
            ) {
                $notif->markAsRead();
            }
        }

        return view('home', compact('forums'));
    }


    public function approve($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->status = 'published';
        $forum->save();
        return redirect()->back()->with('success', 'Forum berhasil disetujui.');
    }

    public function reject($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->delete(); // Atau ubah ke status 'rejected' kalau mau
        return redirect()->back()->with('error', 'Forum ditolak dan dihapus.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_forums = kategori_forum::all();
        return view('admin.forum.create', compact('kategori_forums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kategori_forum_id' => 'required|exists:kategori_forums,id',
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
            ]);

            Forum::create([
                'user_id' => Auth::id(),
                'kategori_forum_id' => $request->kategori_forum_id,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'status' => 'pending',
            ]);

            return redirect()->route('forum')->with('success', 'Forum berhasil ditambahkan, sedang menunggu persetujuan moderator.');
        } catch (\Exception $e) {
            // Simpen log error mun perlu
            Log::error('Gagal nambah forum: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menambahkan forum. Coba lagi nanti.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $forum = Forum::with(['user', 'komentar.user']) // load user jeung komentarna
            ->findOrFail($id); // pastikeun forum na aya

        return view('forum.show', compact('forum'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(forum $forum)
    {
        return view('admin.forum.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, forum $forum)
    {
        $request->validate([
            'kategori_forum_id' => 'required',
            'judul' => 'required,' . $forum->id,
            'isi' => 'required',
        ]);

        $forum->update($request->all());
        return redirect()->route('forum.index')->with('success', 'Forum updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(forum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Forum deleted successfully.');
    }
}
