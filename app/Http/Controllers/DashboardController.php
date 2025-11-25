<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        $tahunAjarAktif = TahunAjar::latest()->first();
        $totalJurusan = Jurusan::count();
        $totalKelas = Kelas::count();
        $totalSiswa = Siswa::count();

        return view('dashboard', compact('siswas', 'totalKelas', 'totalSiswa', 'totalJurusan', 'tahunAjarAktif'));
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
