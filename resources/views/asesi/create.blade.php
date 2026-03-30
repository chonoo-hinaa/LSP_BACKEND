@extends('layouts.app')

@section('title', 'Tambah Data Asesi')

@section('content')
<div style="max-width: 800px;">
    <h3 class="mb-4">Tambah Data Asesi</h3>
    
    <form action="{{ route('asesi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <p class="text-muted mb-4"><span class="text-danger">( * )</span> Wajib di isi</p>
        
        <div class="mb-4">
            <label for="tahun_aktif" class="form-label">Tahun Aktif<span class="text-danger">*</span></label>
            <select class="form-select @error('tahun_aktif') is-invalid @enderror" id="tahun_aktif" name="tahun_aktif" required>
                <option value="">Pilih Tahun Aktif</option>
                @php
                    $currentYear = date('Y');
                    for ($year = $currentYear; $year >= $currentYear - 5; $year--) {
                        $selected = old('tahun_aktif') == $year ? 'selected' : '';
                        echo "<option value='$year' $selected>$year</option>";
                    }
                @endphp
            </select>
            @error('tahun_aktif')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="no_peserta" class="form-label">No Peserta<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('no_peserta') is-invalid @enderror" 
                   id="no_peserta" name="no_peserta" value="{{ old('no_peserta') }}" required>
            <small class="text-muted d-block mt-1">Masuk Nomor Peserta</small>
            @error('no_peserta')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="nama" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                   id="nama" name="nama" value="{{ old('nama') }}" required>
            <small class="text-muted d-block mt-1">Masukkan nama Asesi</small>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="kelas" class="form-label">Kelas<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('kelas') is-invalid @enderror" 
                   id="kelas" name="kelas" value="{{ old('kelas') }}" required>
            <small class="text-muted d-block mt-1">Masukkan kelas Asesi</small>
            @error('kelas')
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
        
        <hr class="my-5">
        <h5 class="mb-4">Akun Asesi</h5>
        
        <div class="mb-4">
            <label for="nama_pengguna" class="form-label">Nama Pengguna<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" 
                   id="nama_pengguna" name="nama_pengguna" value="{{ old('nama_pengguna') }}" required>
            <small class="text-muted d-block mt-1">Masukan Nama Pengguna</small>
            @error('nama_pengguna')
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
            <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" 
                   id="password_confirm" name="password_confirm" required>
            <small class="text-muted d-block mt-1">Masukan Lagi Kata Sandi</small>
            @error('password_confirm')
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