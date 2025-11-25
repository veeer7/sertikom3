<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'jurusan_id',
        'kelas_id',
        'tahun_ajar_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];


    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

        public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function TahunAjar()
    {
        return $this->belongsTo(TahunAjar::class);
    }

    public function KelasDetails()
    {
        return $this->hasMany(KelasDetail::class);
    }
}
