<?php

namespace App\Http\Controllers;

use App\Models\Tuk;
use Illuminate\Http\Request;

class TukController extends Controller
{
    public function index()
    {
        $tuks = Tuk::latest()->paginate(10);
        return view('tuk.index', compact('tuks'));
    }

    public function create()
    {
        return view('tuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_tuk' => 'required|unique:tuk,kode_tuk',
            'nama_tuk' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'jenis_tuk' => 'required|in:sewaktu,tempat_kerja,mandiri',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        Tuk::create($validated);

        return redirect()->route('tuk.index')
            ->with('success', 'Data TUK berhasil ditambahkan.');
    }

    public function show(Tuk $tuk)
    {
        return view('tuk.show', compact('tuk'));
    }

    public function edit(Tuk $tuk)
    {
        return view('tuk.edit', compact('tuk'));
    }

    public function update(Request $request, Tuk $tuk)
    {
        $validated = $request->validate([
            'kode_tuk' => 'required|unique:tuk,kode_tuk,' . $tuk->id,
            'nama_tuk' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'jenis_tuk' => 'required|in:sewaktu,tempat_kerja,mandiri',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $tuk->update($validated);

        return redirect()->route('tuk.index')
            ->with('success', 'Data TUK berhasil diperbarui.');
    }

    public function destroy(Tuk $tuk)
    {
        $tuk->delete();

        return redirect()->route('tuk.index')
            ->with('success', 'Data TUK berhasil dihapus.');
    }
}