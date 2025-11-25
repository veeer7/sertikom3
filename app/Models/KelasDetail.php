<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasDetail extends Model
{
    use HasFactory;

    protected $table = 'kelas_detail';

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'tahun_ajar_id',
        'status',
    ];

    public function siswas() 
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function TahunAjar()
    {
        return $this->belongsTo(TahunAjar::class);
    }
}
