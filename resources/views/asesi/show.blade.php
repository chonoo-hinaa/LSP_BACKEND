@extends('layouts.app')

@section('title', 'Detail Asesi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Asesi</h5>
        <div>
            <a href="{{ route('asesi.edit', $asesi) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('asesi.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-3">
                @if($asesi->foto)
                    <img src="{{ asset('storage/' . $asesi->foto) }}" alt="Foto" class="img-fluid rounded">
                @else
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="width: 200px; height: 300px;">
                        <i class="bi bi-person" style="font-size: 100px; color: white;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-borderless">
                    <tr>
                        <td class="fw-bold" style="width: 200px;">No Peserta</td>
                        <td>: {{ $asesi->no_peserta }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Nama Lengkap</td>
                        <td>: {{ $asesi->nama }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Kelas</td>
                        <td>: {{ $asesi->kelas }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Tahun Aktif</td>
                        <td>: {{ $asesi->tahun_aktif }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Nama Pengguna</td>
                        <td>: {{ $asesi->nama_pengguna }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
