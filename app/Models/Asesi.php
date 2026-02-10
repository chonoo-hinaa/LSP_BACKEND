<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesi extends Model
{
    use HasFactory;

    protected $table = 'asesi';

    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'no_telepon',
        'alamat',
        'foto'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    public function permohonan()
    {
        return $this->hasMany(PermohonanSertifikasi::class);
    }
}