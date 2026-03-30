<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;

    protected $table = 'asesor';

    protected $fillable = [
        'nama_lengkap',
        'no_MET',
        'akun',
        'foto',
        'status',
    ];

    public function skemas()
    {
        return $this->belongsToMany(Skema::class, 'asesor_skema');
    }
}