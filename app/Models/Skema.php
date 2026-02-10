<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $table = 'skema';

    protected $fillable = [
        'kode_skema',
        'nama_skema',
        'jenjang',
        'deskripsi',
        'status'
    ];

    public function asesors()
    {
        return $this->belongsToMany(Asesor::class, 'asesor_skema');
    }

    public function jadwalUjikom()
    {
        return $this->hasMany(JadwalUjikom::class);
    }
}