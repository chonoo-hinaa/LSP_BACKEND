<?php

namespace App\Http\Controllers;

use App\Models\KopSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KopSuratController extends Controller
{
    public function index()
    {
        $kopSurat = KopSurat::first();
        return view('kop-surat.index', compact('kopSurat'));
    }

    public function create()
    {
        return view('kop-surat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('kop-surat', 'public');
        }

        KopSurat::create($validated);

        return redirect()->route('kop-surat.index')
            ->with('success', 'Kop surat berhasil ditambahkan.');
    }

    public function edit(KopSurat $kopSurat)
    {
        return view('kop-surat.edit', compact('kopSurat'));
    }

    public function update(Request $request, KopSurat $kopSurat)
    {
        $validated = $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            if ($kopSurat->logo) {
                Storage::disk('public')->delete($kopSurat->logo);
            }
            $validated['logo'] = $request->file('logo')->store('kop-surat', 'public');
        }

        $kopSurat->update($validated);

        return redirect()->route('kop-surat.index')
            ->with('success', 'Kop surat berhasil diperbarui.');
    }
}