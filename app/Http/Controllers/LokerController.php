<?php

namespace App\Http\Controllers;

use App\Models\Kategori_loker;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loker = Loker::all();
        return view('admin.loker.index', compact('loker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori_loker::all();
        return view('admin.loker.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_loker_id' => 'required|exists:kategori_lokers,id',
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'gaji' => 'required|string|max:255',
            'persyaratan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images/loker', 'public');
        }

        Loker::create([
            'kategori_loker_id' => $request->kategori_loker_id,
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'gaji' => $request->gaji,
            'persyaratan' => $request->persyaratan,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('loker.index')->with('success', 'Loker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loker $loker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loker $loker)
    {
        $kategori = Kategori_loker::all();
        return view('admin.loker.edit', compact('loker', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loker $loker)
    {
        $request->validate([
            'kategori_loker_id' => 'required|exists:kategori_lokers,id',
            'judul' => 'required|string|max:255,' . $loker->id,
            'lokasi' => 'required|string|max:255',
            'gaji' => 'required|string|max:255',
            'persyaratan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarPath = $loker->gambar;
        if ($request->hasFile('gambar')) {
            if ($loker->gambar) {
                Storage::disk('public')->delete('images/loker/' . $loker->gambar);
            }
            $gambarPath = $request->file('gambar')->store('images/loker', 'public');
        }

        $loker->update([
            'kategori_loker_id' => $request->kategori_loker_id,
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'gaji' => $request->gaji,
            'persyaratan' => $request->persyaratan,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('loker.index')->with('success', 'Loker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loker $loker)
    {
        $loker->delete();
        return redirect()->route('loker.index')->with('success', 'Loker deleted successfully.');
    }
}
