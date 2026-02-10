<?php

namespace App\Http\Controllers;

use App\Models\AsesorSkema;
use App\Models\Asesor;
use App\Models\Skema;
use Illuminate\Http\Request;

class AsesorSkemaController extends Controller
{
    public function index()
    {
        $asesorSkemas = AsesorSkema::with(['asesor', 'skema'])->latest()->paginate(10);
        $asesors = Asesor::where('status', 'aktif')->get();
        $skemas = Skema::where('status', 'aktif')->get();
        
        return view('asesor-skema.index', compact('asesorSkemas', 'asesors', 'skemas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asesor_id' => 'required|exists:asesor,id',
            'skema_id' => 'required|exists:skema,id'
        ]);

        // Check if combination already exists
        $exists = AsesorSkema::where('asesor_id', $validated['asesor_id'])
            ->where('skema_id', $validated['skema_id'])
            ->exists();

        if ($exists) {
            return redirect()->route('asesor-skema.index')
                ->with('error', 'Asesor sudah ditugaskan pada skema ini.');
        }

        AsesorSkema::create($validated);

        return redirect()->route('asesor-skema.index')
            ->with('success', 'Asesor berhasil ditugaskan ke skema.');
    }

    public function destroy(AsesorSkema $asesorSkema)
    {
        $asesorSkema->delete();

        return redirect()->route('asesor-skema.index')
            ->with('success', 'Penugasan asesor berhasil dihapus.');
    }
}