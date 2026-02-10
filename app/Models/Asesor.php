<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;

    protected $table = 'asesor';

    protected $fillable = [
        'no_reg',
        'nama',
        'email',
        'no_telepon',
        'alamat',
        'status',
        'foto'
    ];

    public function skemas()
    {
        return $this->belongsToMany(Skema::class, 'asesor_skema');
    }
}