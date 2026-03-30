<?php

namespace App\Http\Controllers;

use App\Models\Asesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsesiController extends Controller
{
    public function index()
    {
        $asesis = Asesi::latest()->paginate(10);
        return view('asesi.index', compact('asesis'));
    }

    public function create()
    {
        return view('asesi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_peserta' => 'required|unique:asesi,no_peserta',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tahun_aktif' => 'required|integer|min:2000|max:2100',
            'nama_pengguna' => 'required|unique:asesi,nama_pengguna',
            'password' => 'required|string|min:6',
            'password_confirm' => 'required|same:password',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('asesi', 'public');
        }

        // Remove password fields before creating the record
        unset($validated['password'], $validated['password_confirm']);

        Asesi::create($validated);

        return redirect()->route('asesi.index')
            ->with('success', 'Data asesi berhasil ditambahkan.');
    }

    public function show(Asesi $asesi)
    {
        $asesi->load('permohonan.jadwalUjikom.skema');
        return view('asesi.show', compact('asesi'));
    }

    public function edit(Asesi $asesi)
    {
        return view('asesi.edit', compact('asesi'));
    }

    public function update(Request $request, Asesi $asesi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tahun_aktif' => 'required|integer|min:2000|max:2100',
            'nama_pengguna' => 'required|unique:asesi,nama_pengguna,' . $asesi->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($asesi->foto) {
                Storage::disk('public')->delete($asesi->foto);
            }
            $validated['foto'] = $request->file('foto')->store('asesi', 'public');
        }

        $asesi->update($validated);

        return redirect()->route('asesi.index')
            ->with('success', 'Data asesi berhasil diperbarui.');
    }

    public function destroy(Asesi $asesi)
    {
        if ($asesi->foto) {
            Storage::disk('public')->delete($asesi->foto);
        }

        $asesi->delete();

        return redirect()->route('asesi.index')
            ->with('success', 'Data asesi berhasil dihapus.');
    }
}