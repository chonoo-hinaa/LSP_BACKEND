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
                        <td class="fw-bold" style="width: 200px;">NIS</td>
                        <td>: {{ $asesi->nis }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Nama Lengkap</td>
                        <td>: {{ $asesi->nama }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Jenis Kelamin</td>
                        <td>: {{ $asesi->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Tempat Lahir</td>
                        <td>: {{ $asesi->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Tanggal Lahir</td>
                        <td>: {{ $asesi->tanggal_lahir->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Email</td>
                        <td>: {{ $asesi->email }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">No Telepon</td>
                        <td>: {{ $asesi->no_telepon }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Alamat</td>
                        <td>: {{ $asesi->alamat }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
