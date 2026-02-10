<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::latest()->paginate(10);
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_skema' => 'required|unique:skema,kode_skema',
            'nama_skema' => 'required|string|max:255',
            'jenjang' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        Skema::create($validated);

        return redirect()->route('skema.index')
            ->with('success', 'Data skema berhasil ditambahkan.');
    }

    public function show(Skema $skema)
    {
        $skema->load('asesors');
        return view('skema.show', compact('skema'));
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $validated = $request->validate([
            'kode_skema' => 'required|unique:skema,kode_skema,' . $skema->id,
            'nama_skema' => 'required|string|max:255',
            'jenjang' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $skema->update($validated);

        return redirect()->route('skema.index')
            ->with('success', 'Data skema berhasil diperbarui.');
    }

    public function destroy(Skema $skema)
    {
        $skema->delete();

        return redirect()->route('skema.index')
            ->with('success', 'Data skema berhasil dihapus.');
    }
}