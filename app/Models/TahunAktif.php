<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAktif extends Model
{
    use HasFactory;

    protected $table = 'tahun_aktif';

    protected $fillable = [
        'tahun',
        'semester',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function jadwalUjikom()
    {
        return $this->hasMany(JadwalUjikom::class);
    }
}