<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsesorController extends Controller
{
    public function index()
    {
        $asesors = Asesor::latest()->paginate(10);
        return view('asesor.index', compact('asesors'));
    }

    public function create()
    {
        return view('asesor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_reg' => 'required|unique:asesor,no_reg',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:asesor,email',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('asesor', 'public');
        }

        Asesor::create($validated);

        return redirect()->route('asesor.index')
            ->with('success', 'Data asesor berhasil ditambahkan.');
    }

    public function show(Asesor $asesor)
    {
        $asesor->load('skemas');
        return view('asesor.show', compact('asesor'));
    }

    public function edit(Asesor $asesor)
    {
        return view('asesor.edit', compact('asesor'));
    }

    public function update(Request $request, Asesor $asesor)
    {
        $validated = $request->validate([
            'no_reg' => 'required|unique:asesor,no_reg,' . $asesor->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:asesor,email,' . $asesor->id,
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($asesor->foto) {
                Storage::disk('public')->delete($asesor->foto);
            }
            $validated['foto'] = $request->file('foto')->store('asesor', 'public');
        }

        $asesor->update($validated);

        return redirect()->route('asesor.index')
            ->with('success', 'Data asesor berhasil diperbarui.');
    }

    public function destroy(Asesor $asesor)
    {
        if ($asesor->foto) {
            Storage::disk('public')->delete($asesor->foto);
        }

        $asesor->delete();

        return redirect()->route('asesor.index')
            ->with('success', 'Data asesor berhasil dihapus.');
    }
}