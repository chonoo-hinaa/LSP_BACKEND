@extends('layouts.app')

@section('title', 'Tambah Asesor')

@section('content')
<div style="max-width: 800px;">
    <form action="{{ route('asesor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <p class="text-muted mb-4"><span class="text-danger">( * )</span> Wajib di isi</p>
        
        <div class="mb-4">
            <label for="no_MET" class="form-label">No MET<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('no_MET') is-invalid @enderror" 
                   id="no_MET" name="no_MET" value="{{ old('no_MET') }}" required>
            <small class="text-muted d-block mt-1">Masuk Nomor MET</small>
            @error('no_MET')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                   id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
            <small class="text-muted d-block mt-1">Masukkan nama Asesor</small>
            @error('nama_lengkap')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                   id="foto" name="foto" accept="image/*">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <p class="fw-bold text-secondary mb-3">Akun Asesor</p>
        
        <div class="mb-4">
            <label for="akun" class="form-label">Nama Pengguna<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('akun') is-invalid @enderror" 
                   id="akun" name="akun" value="{{ old('akun') }}" required>
            <small class="text-muted d-block mt-1">Masukan Nama Pengguna</small>
            @error('akun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="password" class="form-label">Kata Sandi<span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" required>
            <small class="text-muted d-block mt-1">Masukan Kata Sandi</small>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="password_confirm" class="form-label">Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
            <input type="password" class="form-control" 
                   id="password_confirm" name="password_confirm" required>
            <small class="text-muted d-block mt-1">Masukan Lagi Kata Sandi</small>
        </div>
        
        <div class="mb-4">
            <label for="status" class="form-label">Status Akun<span class="text-danger">*</span></label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="aktif" selected>Aktif</option>
                <option value="nonaktif">Non-Aktif</option>
            </select>
            <small class="text-muted d-block mt-1">Pilih status akun</small>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mt-5">
            <a href="{{ route('asesor.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Data Asesor
            </button>
        </div>
    </form>
</div>
@endsection