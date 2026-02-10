<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSertifikasi;
use App\Models\Asesi;
use App\Models\JadwalUjikom;
use Illuminate\Http\Request;

class PermohonanSertifikasiController extends Controller
{
    public function index()
    {
        $permohonans = PermohonanSertifikasi::with(['asesi', 'jadwalUjikom.skema'])
            ->latest()
            ->paginate(10);
        
        return view('permohonan.index', compact('permohonans'));
    }

    public function create()
    {
        $asesis = Asesi::all();
        $jadwals = JadwalUjikom::with('skema')
            ->where('status', 'dibuka')
            ->get();
        
        return view('permohonan.create', compact('asesis', 'jadwals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asesi_id' => 'required|exists:asesi,id',
            'jadwal_ujikom_id' => 'required|exists:jadwal_ujikom,id',
            'tanggal_permohonan' => 'required|date',
            'status' => 'required|in:menunggu,diterima,ditolak',
            'catatan' => 'nullable|string'
        ]);

        // Generate nomor permohonan
        $lastPermohonan = PermohonanSertifikasi::latest()->first();
        $number = $lastPermohonan ? intval(substr($lastPermohonan->no_permohonan, -4)) + 1 : 1;
        $validated['no_permohonan'] = 'PMH-' . date('Ymd') . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);

        PermohonanSertifikasi::create($validated);

        return redirect()->route('permohonan.index')
            ->with('success', 'Permohonan sertifikasi berhasil ditambahkan.');
    }

    public function show(PermohonanSertifikasi $permohonan)
    {
        $permohonan->load(['asesi', 'jadwalUjikom.skema', 'jadwalUjikom.tuk']);
        return view('permohonan.show', compact('permohonan'));
    }

    public function edit(PermohonanSertifikasi $permohonan)
    {
        $asesis = Asesi::all();
        $jadwals = JadwalUjikom::with('skema')->get();
        
        return view('permohonan.edit', compact('permohonan', 'asesis', 'jadwals'));
    }

    public function update(Request $request, PermohonanSertifikasi $permohonan)
    {
        $validated = $request->validate([
            'asesi_id' => 'required|exists:asesi,id',
            'jadwal_ujikom_id' => 'required|exists:jadwal_ujikom,id',
            'tanggal_permohonan' => 'required|date',
            'status' => 'required|in:menunggu,diterima,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $permohonan->update($validated);

        return redirect()->route('permohonan.index')
            ->with('success', 'Permohonan sertifikasi berhasil diperbarui.');
    }

    public function updateStatus(Request $request, PermohonanSertifikasi $permohonan)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $permohonan->update($validated);

        return redirect()->route('permohonan.index')
            ->with('success', 'Status permohonan berhasil diperbarui.');
    }

    public function destroy(PermohonanSertifikasi $permohonan)
    {
        $permohonan->delete();

        return redirect()->route('permohonan.index')
            ->with('success', 'Permohonan sertifikasi berhasil dihapus.');
    }
}