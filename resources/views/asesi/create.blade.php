@extends('layouts.app')

@section('title', 'Tambah Asesi')

@section('content')
<div style="max-width: 800px;">
    <form action="{{ route('asesi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <p class="text-muted mb-4"><span class="text-danger">( * )</span> Wajib di isi</p>
        
        <div class="mb-4">
            <label for="nis" class="form-label">NIS<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nis') is-invalid @enderror" 
                   id="nis" name="nis" value="{{ old('nis') }}" required>
            <small class="text-muted d-block mt-1">Masukkan Nomor Induk Siswa</small>
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="nama" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                   id="nama" name="nama" value="{{ old('nama') }}" required>
            <small class="text-muted d-block mt-1">Masukkan nama lengkap</small>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="tempat_lahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                   id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
            <small class="text-muted d-block mt-1">Masukkan tempat lahir</small>
            @error('tempat_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                   id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
            @error('tanggal_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ old('email') }}" required>
            <small class="text-muted d-block mt-1">Masukkan alamat email</small>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="no_telepon" class="form-label">No Telepon<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" 
                   id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" required>
            <small class="text-muted d-block mt-1">Masukkan nomor telepon</small>
            @error('no_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                      id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
            <small class="text-muted d-block mt-1">Masukkan alamat lengkap</small>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                   id="foto" name="foto" accept="image/*">
            <small class="text-muted d-block mt-1">Format: JPG, PNG. Maks: 2MB</small>
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mt-5">
            <a href="{{ route('asesi.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Data Asesi
            </button>
        </div>
    </form>
</div>
@endsection
