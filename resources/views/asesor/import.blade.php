@extends('layouts.app')

@section('title', 'Import Data Asesor')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Import Data Asesor</h5>
        <small class="text-muted">LSP PJI SMK NEGERI 1 GARUT</small>
    </div>
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('asesor.index') }}">Referensi</a></li>
                <li class="breadcrumb-item active">Asesor</li>
            </ol>
        </nav>

        <div class="alert alert-info" role="alert">
            <strong>Petunjuk:</strong> Unduh template Excel terlebih dahulu, isi data sesuai format, kemudian upload file untuk mengimpor data.
        </div>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6 class="alert-heading">Terjadi Kesalahan:</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card bg-light">
                    <div class="card-header">
                        <h6 class="mb-0">Data Asesor</h6>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('asesor.download-template') }}" class="btn btn-success btn-lg mb-4">
                            <i class="bi bi-download"></i> Unduh Template Excel
                        </a>

                        <h6 class="mt-4 mb-3">Unggah Data Asesor</h6>
                        <form action="{{ route('asesor.import-data') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">Pilih File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-sm-flex">
                                <button type="submit" class="btn btn-primary" id="import-btn">
                                    <i class="bi bi-check-circle"></i> Import data
                                </button>
                                <a href="{{ route('asesor.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
