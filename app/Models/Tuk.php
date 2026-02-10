<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuk extends Model
{
    use HasFactory;

    protected $table = 'tuk';

    protected $fillable = [
        'kode_tuk',
        'nama_tuk',
        'alamat',
        'no_telepon',
        'jenis_tuk',
        'status'
    ];

    public function jadwalUjikom()
    {
        return $this->hasMany(JadwalUjikom::class);
    }
}