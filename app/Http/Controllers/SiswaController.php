<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\TahunAjar;
use App\Models\RiwayatKelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::latest()->get();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('siswa.index', compact('siswas', 'kelas', 'jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tahunAjar = TahunAjar::all();

        return view('siswa.create', compact('kelas', 'jurusan', 'tahunAjar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nisn' => 'required|unique:siswas',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'tahun_ajar_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = Siswa::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);

        // Buat riwayat kelas pertama kali
        RiwayatKelas::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
            'is_active' => true
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::with(['kelas', 'jurusan', 'tahunAjar'])->findOrFail($id);

        $kelas = Kelas::with('jurusan')->orderBy('level_kelas')->get();

        $kelasSekarang = $siswa->kelas;

        // Get riwayat kelas
        $riwayatKelas = RiwayatKelas::with(['kelas.jurusan', 'tahunAjar'])
            ->where('siswa_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('siswa.show', compact('siswa', 'kelas', 'kelasSekarang', 'riwayatKelas'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tahunAjar = TahunAjar::all();

        return view('siswa.edit', compact('siswa', 'kelas', 'jurusan', 'tahunAjar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }

    public function naikKelas(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'kelas_baru' => 'required|exists:kelas,id',
        ]);

        // Set semua riwayat kelas lama menjadi non-aktif
        RiwayatKelas::where('siswa_id', $id)
            ->update(['is_active' => false]);

        // Update kelas siswa
        $siswa->update([
            'kelas_id' => $request->kelas_baru
        ]);

        // Buat riwayat kelas baru dengan status aktif
        RiwayatKelas::create([
            'siswa_id' => $id,
            'kelas_id' => $request->kelas_baru,
            'tahun_ajar_id' => $siswa->tahun_ajar_id,
            'is_active' => true
        ]);

        return redirect()->route('siswa.show', $id)->with('success', 'Siswa berhasil naik kelas!');
    }
}