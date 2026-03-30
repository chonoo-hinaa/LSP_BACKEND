<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesi extends Model
{
    use HasFactory;

    protected $table = 'asesi';

    protected $fillable = [
        'no_peserta',
        'nama',
        'kelas',
        'tahun_aktif',
        'nama_pengguna',
        'foto'
    ];

    protected $casts = [
        'tahun_aktif' => 'integer'
    ];

    public function permohonan()
    {
        return $this->hasMany(PermohonanSertifikasi::class);
    }
}