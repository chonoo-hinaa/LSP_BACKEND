@extends('layouts.app')

@section('title', 'Detail Asesor')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Asesor</h5>
        <div>
            <a href="{{ route('asesor.edit', $asesor) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('asesor.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($asesor->foto)
                    <img src="{{ asset('storage/' . $asesor->foto) }}" alt="Foto Asesor" class="img-thumbnail mb-3" style="max-width: 200px;">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center mb-3" style="width: 200px; height: 200px; margin: 0 auto;">
                        <i class="bi bi-person" style="font-size: 5rem;"></i>
                    </div>
                @endif
            </div>
            
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr>
                        <th width="200">No. Registrasi</th>
                        <td>{{ $asesor->no_reg }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $asesor->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $asesor->email }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td>{{ $asesor->no_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $asesor->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge bg-{{ $asesor->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($asesor->status) }}
                            </span>
                        </td>
                    </tr>
                </table>
                
                <h6 class="mt-4">Skema yang Ditugaskan:</h6>
                @if($asesor->skemas->count() > 0)
                    <ul class="list-group">
                        @foreach($asesor->skemas as $skema)
                            <li class="list-group-item">
                                <strong>{{ $skema->kode_skema }}</strong> - {{ $skema->nama_skema }}
                                <span class="badge bg-info float-end">{{ $skema->jenjang }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Belum ada skema yang ditugaskan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection