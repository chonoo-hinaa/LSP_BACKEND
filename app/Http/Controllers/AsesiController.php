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
            'nis' => 'required|unique:asesi,nis',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:asesi,email',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('asesi', 'public');
        }

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
            'nis' => 'required|unique:asesi,nis,' . $asesi->id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:asesi,email,' . $asesi->id,
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
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