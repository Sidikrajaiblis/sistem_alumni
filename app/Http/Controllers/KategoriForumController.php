<?php

namespace App\Http\Controllers;

use App\Models\kategori_forum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriforum = kategori_forum::all();
        return view('admin.kategori_forum.index', compact('kategoriforum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori_forum = new kategori_forum();
        $kategori_forum->nama = $request->nama;
        $kategori_forum->slug = Str::slug($request->nama, '-');
        $kategori_forum->save();

        return redirect()->route('kategori_forum.index')->with('success', 'Kategori Forum created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori_forum $kategori_forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori_forum $kategori_forum)
    {
        return view('admin.kategori_forum.edit', compact('kategori_forum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori_forum $kategori_forum)
    {
        $request->validate([
            'nama' => 'required|string|max:255,' . $kategori_forum->id,
        ]);

        $kategori_forum->nama = $request->nama;
        $kategori_forum->slug = Str::slug($request->nama, '-');
        $kategori_forum->save();

        return redirect()->route('kategori_forum.index')->with('success', 'Kategori Forum updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori_forum $kategori_forum)
    {
        if ($kategori_forum->Loker()->count() > 0) {
            return redirect()->route('admin.kategori_forum.index')->with('error', 'Kategori tidak dapat dihapus karena memiliki loker terkait.');
        }
        $kategori_forum->delete();

        return redirect()->route('admin.kategori_forum.index')->with('success', 'Kategori Loker deleted successfully.');
    }
}
