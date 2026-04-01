@extends('layouts.app')

@section('title', 'Data Asesor')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Asesor</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('asesor.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Data Asesor
            </a>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-gear"></i> Opsi Data
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('asesor.export') }}">
                        <i class="bi bi-download"></i> Export Data Asesor
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('asesor.import') }}">
                        <i class="bi bi-upload"></i> Import Data Asesor
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                Show
                <select class="form-select d-inline-block" style="width: auto;">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                entries
            </div>
            <div>
                Search: <input type="text" class="form-control d-inline-block" style="width: 300px;">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>No MET</th>
                        <th>Akun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($asesors as $index => $asesor)
                    <tr>
                        <td>{{ $asesors->firstItem() + $index }}</td>
                        <td>
                            @if($asesor->foto)
                                <img src="{{ asset('storage/' . $asesor->foto) }}" alt="Foto" width="100" height="100" style="object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person" style="font-size: 24px; color: white;"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $asesor->nama_lengkap }}</td>
                        <td>{{ $asesor->no_MET }}</td>
                        <td>
                            <span class="badge bg-{{ $asesor->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($asesor->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('asesor.show', $asesor) }}" class="btn btn-success btn-sm" title="Lihat">
                                <i class="bi bi-search"></i>
                            </a>
                            <a href="{{ route('asesor.edit', $asesor) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('asesor.destroy', $asesor) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada data asesor</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $asesors->links() }}
        </div>
    </div>
</div>
@endsection