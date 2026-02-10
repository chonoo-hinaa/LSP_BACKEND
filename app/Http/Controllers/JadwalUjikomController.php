<?php

namespace App\Http\Controllers;

use App\Models\JadwalUjikom;
use App\Models\Skema;
use App\Models\Tuk;
use App\Models\TahunAktif;
use Illuminate\Http\Request;

class JadwalUjikomController extends Controller
{
    public function index()
    {
        $jadwals = JadwalUjikom::with(['skema', 'tuk', 'tahunAktif'])->latest()->paginate(10);
        return view('jadwal-ujikom.index', compact('jadwals'));
    }

    public function create()
    {
        $skemas = Skema::where('status', 'aktif')->get();
        $tuks = Tuk::where('status', 'aktif')->get();
        $tahunAktif = TahunAktif::where('is_active', true)->first();
        
        return view('jadwal-ujikom.create', compact('skemas', 'tuks', 'tahunAktif'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'skema_id' => 'required|exists:skema,id',
            'tuk_id' => 'required|exists:tuk,id',
            'tahun_aktif_id' => 'required|exists:tahun_aktif,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:dibuka,ditutup,selesai,dibatalkan',
            'keterangan' => 'nullable|string'
        ]);

        JadwalUjikom::create($validated);

        return redirect()->route('jadwal-ujikom.index')
            ->with('success', 'Jadwal ujikom berhasil ditambahkan.');
    }

    public function show(JadwalUjikom $jadwalUjikom)
    {
        $jadwalUjikom->load(['skema', 'tuk', 'tahunAktif', 'permohonan.asesi']);
        return view('jadwal-ujikom.show', compact('jadwalUjikom'));
    }

    public function edit(JadwalUjikom $jadwalUjikom)
    {
        $skemas = Skema::where('status', 'aktif')->get();
        $tuks = Tuk::where('status', 'aktif')->get();
        $tahunAktifs = TahunAktif::all();
        
        return view('jadwal-ujikom.edit', compact('jadwalUjikom', 'skemas', 'tuks', 'tahunAktifs'));
    }

    public function update(Request $request, JadwalUjikom $jadwalUjikom)
    {
        $validated = $request->validate([
            'skema_id' => 'required|exists:skema,id',
            'tuk_id' => 'required|exists:tuk,id',
            'tahun_aktif_id' => 'required|exists:tahun_aktif,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:dibuka,ditutup,selesai,dibatalkan',
            'keterangan' => 'nullable|string'
        ]);

        $jadwalUjikom->update($validated);

        return redirect()->route('jadwal-ujikom.index')
            ->with('success', 'Jadwal ujikom berhasil diperbarui.');
    }

    public function destroy(JadwalUjikom $jadwalUjikom)
    {
        $jadwalUjikom->delete();

        return redirect()->route('jadwal-ujikom.index')
            ->with('success', 'Jadwal ujikom berhasil dihapus.');
    }
}