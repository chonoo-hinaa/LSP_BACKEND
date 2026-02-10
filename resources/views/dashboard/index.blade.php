@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Asesor</h6>
                        <h2 class="mb-0">{{ $total_asesor }}</h2>
                    </div>
                    <i class="bi bi-people" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer bg-primary bg-opacity-75">
                <a href="{{ route('asesor.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Asesi</h6>
                        <h2 class="mb-0">{{ $total_asesi }}</h2>
                    </div>
                    <i class="bi bi-person-badge" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer bg-success bg-opacity-75">
                <a href="{{ route('asesi.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Skema</h6>
                        <h2 class="mb-0">{{ $total_skema }}</h2>
                    </div>
                    <i class="bi bi-file-text" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer bg-info bg-opacity-75">
                <a href="{{ route('skema.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Pengguna</h6>
                        <h2 class="mb-0">{{ $total_users }}</h2>
                    </div>
                    <i class="bi bi-person-gear" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer bg-warning bg-opacity-75">
                <a href="{{ route('users.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-calendar-event"></i> Jadwal Ujikom Aktif</h5>
            </div>
            <div class="card-body">
                <h3>{{ $jadwal_aktif }}</h3>
                <p class="text-muted mb-0">Jadwal yang sedang dibuka</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="bi bi-file-earmark-check"></i> Status Permohonan</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4">
                        <h4 class="text-warning">{{ $permohonan_menunggu }}</h4>
                        <small>Menunggu</small>
                    </div>
                    <div class="col-4">
                        <h4 class="text-success">{{ $permohonan_diterima }}</h4>
                        <small>Diterima</small>
                    </div>
                    <div class="col-4">
                        <h4 class="text-danger">{{ $permohonan_ditolak }}</h4>
                        <small>Ditolak</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection