<?php

namespace App\Http\Controllers;

use App\Models\Kategori_loker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriLoker = Kategori_loker::all();
        return view('admin.kategori_loker.index', compact('kategoriLoker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_loker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategoriLoker = new Kategori_loker();
        $kategoriLoker->nama = $request->nama;
        $kategoriLoker->slug = Str::slug($request->nama, '-');
        $kategoriLoker->save();

        return redirect()->route('admin.kategori_loker.index')->with('success', 'Kategori Loker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori_loker $kategori_loker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori_loker $kategori_loker)
    {
        return view('admin.kategori_loker.edit', compact('kategori_loker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori_loker $kategori_loker)
    {
        $request->validate([
            'nama' => 'required|string|max:255,'. $kategori_loker->id,
        ]);

        $kategori_loker->nama = $request->nama;
        $kategori_loker->slug = Str::slug($request->nama, '-');
        $kategori_loker->save();

        return redirect()->route('admin.kategori_loker.index')->with('success', 'Kategori Loker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori_loker $kategori_loker)
    {
        if ($kategori_loker->Loker()->count() > 0) {
            return redirect()->route('admin.kategori_loker.index')->with('error', 'Kategori tidak dapat dihapus karena memiliki loker terkait.');
        }
        $kategori_loker->delete();

        return redirect()->route('admin.kategori_loker.index')->with('success', 'Kategori Loker deleted successfully.');
    }
}
