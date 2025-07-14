<?php

namespace App\Http\Controllers;

use App\Models\kategori_forum;
use App\Models\Kategori_loker;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data loker
        $lokerData = Kategori_loker::withCount('loker')->get();
        $kategoriLoker = $lokerData->pluck('nama');
        $jumlahLoker = $lokerData->pluck('loker_count');

        // Data forum
        $forumData = Kategori_forum::withCount('forums')->get();
        $kategoriForum = $forumData->pluck('nama');
        $jumlahForum = $forumData->pluck('forums_count');

        $users = User::select('name', 'email', 'role','foto')->get();

        return view('admin.dashboard', compact(
            'kategoriLoker',
            'jumlahLoker',
            'kategoriForum',
            'jumlahForum',
            'users'
        ));
    }
}
