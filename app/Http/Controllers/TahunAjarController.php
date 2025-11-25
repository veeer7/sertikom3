<?php

namespace App\Http\Controllers;

use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjar = TahunAjar::latest()->get();
        return view('tahun-ajar.index', compact('tahunAjar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun-ajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_tahun_ajar' => 'required|unique:tahun_ajars',
            'nama_tahun_ajar' => 'required',
        ]);

        TahunAjar::create([
            'kode_tahun_ajar' => $request->kode_tahun_ajar,
            'nama_tahun_ajar' => $request->nama_tahun_ajar,
        ]);

        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun ajar berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tahunAjar = TahunAjar::findOrFail($id);
        return view('tahun-ajar.edit', compact('tahunAjar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_tahun_ajar' => 'required',
            'nama_tahun_ajar' => 'required',
        ]);

        $tahunAjar = TahunAjar::findOrFail($id);
        $tahunAjar->update([
            'kode_tahun_ajar' => $request->kode_tahun_ajar,
            'nama_tahun_ajar' => $request->nama_tahun_ajar,
        ]);

        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun ajar berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tahunAjar = TahunAjar::findOrFail($id);
        $tahunAjar->delete();

        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun ajar berhasil dihapus!');
    }
}
