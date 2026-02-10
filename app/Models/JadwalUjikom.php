<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUjikom extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ujikom';

    protected $fillable = [
        'skema_id',
        'tuk_id',
        'tahun_aktif_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
        'kuota',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date'
    ];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }

    public function tuk()
    {
        return $this->belongsTo(Tuk::class);
    }

    public function tahunAktif()
    {
        return $this->belongsTo(TahunAktif::class);
    }

    public function permohonan()
    {
        return $this->hasMany(PermohonanSertifikasi::class);
    }
}