<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loker;
use App\Models\Kategori_loker;
use App\Models\kategori_forum;
use App\Models\Forum;

class frontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loker = Loker::all();
        $kategori_lokers = Kategori_loker::all();
        return view('welcome', compact('loker', 'kategori_lokers'));
    }

    public function forum(Request $request)
    {
        $kategori_forums = kategori_forum::all();

        $query = Forum::where('status', '!=', 'pending')
            ->with('user', 'kategoriForum');

        // Cek apakah request mengandung filter kategori
        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori_forum_id', $request->kategori);
        }

        $forums = $query->get();

        return view('forum', compact('kategori_forums', 'forums'));
    }


    public function forumdetail($id)
    {
        $forum = Forum::with(['user', 'kategoriForum', 'komentar.user'])->findOrFail($id);
        return view('moderator.forumdetail', compact('forum'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
