<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('kelas.index', compact('kelas', 'jurusan'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('kelas.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'level_kelas' => $request->level_kelas,
            'jurusan_id' => $request->jurusan_id
        ]);

        return redirect()->route('kelas.index');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);

        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'level_kelas' => $request->level_kelas,
            'jurusan_id' => $request->jurusan_id
        ]);

        return redirect()->route('kelas.index');
    }


    public function destroy($id)
    {
        Kelas::destroy($id);
        return redirect()->route('kelas.index');
    }
}
