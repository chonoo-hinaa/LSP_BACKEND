<?php

namespace App\Http\Controllers;

use App\Models\TahunAktif;
use Illuminate\Http\Request;

class TahunAktifController extends Controller
{
    public function index()
    {
        $tahunAktifs = TahunAktif::latest()->paginate(10);
        return view('tahun-aktif.index', compact('tahunAktifs'));
    }

    public function create()
    {
        return view('tahun-aktif.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun' => 'required|string|max:10',
            'semester' => 'required|string|max:20',
            'is_active' => 'boolean'
        ]);

        if ($request->is_active) {
            TahunAktif::where('is_active', true)->update(['is_active' => false]);
        }

        TahunAktif::create($validated);

        return redirect()->route('tahun-aktif.index')
            ->with('success', 'Tahun aktif berhasil ditambahkan.');
    }

    public function edit(TahunAktif $tahunAktif)
    {
        return view('tahun-aktif.edit', compact('tahunAktif'));
    }

    public function update(Request $request, TahunAktif $tahunAktif)
    {
        $validated = $request->validate([
            'tahun' => 'required|string|max:10',
            'semester' => 'required|string|max:20',
        ]);

        $tahunAktif->update($validated);

        return redirect()->route('tahun-aktif.index')
            ->with('success', 'Tahun aktif berhasil diperbarui.');
    }

    public function activate(TahunAktif $tahunAktif)
    {
        TahunAktif::where('is_active', true)->update(['is_active' => false]);
        $tahunAktif->update(['is_active' => true]);

        return redirect()->route('tahun-aktif.index')
            ->with('success', 'Tahun aktif berhasil diaktifkan.');
    }

    public function destroy(TahunAktif $tahunAktif)
    {
        if ($tahunAktif->is_active) {
            return redirect()->route('tahun-aktif.index')
                ->with('error', 'Tidak dapat menghapus tahun aktif yang sedang aktif.');
        }

        $tahunAktif->delete();

        return redirect()->route('tahun-aktif.index')
            ->with('success', 'Tahun aktif berhasil dihapus.');
    }
}