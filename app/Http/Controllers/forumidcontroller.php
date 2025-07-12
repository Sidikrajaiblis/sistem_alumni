<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\User;

class forumidcontroller extends Controller
{
    public function forumid($id)
    {
        $forums = Forum::with(['komentar.user'])->findOrFail($id);
        $kategori_forums = $forums->kategori_forum;
        $user = User::findOrFail($forums->user_id);
        return view('forumid', compact('forums', 'kategori_forums', 'user'));
    }
}
