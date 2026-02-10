<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Asesi;
use App\Models\Skema;
use App\Models\User;
use App\Models\JadwalUjikom;
use App\Models\PermohonanSertifikasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_asesor' => Asesor::where('status', 'aktif')->count(),
            'total_asesi' => Asesi::count(),
            'total_skema' => Skema::where('status', 'aktif')->count(),
            'total_users' => User::where('status', 'aktif')->count(),
            'jadwal_aktif' => JadwalUjikom::where('status', 'dibuka')->count(),
            'permohonan_menunggu' => PermohonanSertifikasi::where('status', 'menunggu')->count(),
            'permohonan_diterima' => PermohonanSertifikasi::where('status', 'diterima')->count(),
            'permohonan_ditolak' => PermohonanSertifikasi::where('status', 'ditolak')->count(),
        ];

        return view('dashboard.index', $data);
    }
}