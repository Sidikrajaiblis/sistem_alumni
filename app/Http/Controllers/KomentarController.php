<?php

namespace App\Http\Controllers;

use App\Models\forum;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\KomentarBaruNotification;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::with(['user', 'komentar.user' => function ($query) {
            $query->withTrashed();
        }])->latest()->get();
        return view('welcome', compact('forums'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $forumId)
    {
        $request->validate([
            'isi' => 'required|string',
        ]);

        $forum = Forum::findOrFail($forumId);

        $komentar = Komentar::create([
            'forum_id' => $forum->id,
            'user_id' => Auth::id(),
            'isi' => $request->isi,
        ]);

        // Kirim notifikasi ke pemilik forum kecuali yang komen adalah dirinya sendiri
        if ($forum->user_id != Auth::id()) {
            $forum->user->notify(new KomentarBaruNotification($komentar));
        }

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komentar $komentar)
    {
        $user = Auth::user();

        if ($user->id === $komentar->user_id) {
            $komentar->delete();
        } elseif (in_array($user->role, ['moderator', 'admin'])) {
            $komentar->deleted_by = $user->id;
            $komentar->save();
            $komentar->delete();
        } else {
            return back()->with('error', 'Tidak punya akses.');
        }

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}
