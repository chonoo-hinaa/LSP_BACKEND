@extends('layouts.app')

@section('title', 'Data Asesor')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Asesor</h5>
        <a href="{{ route('asesor.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Asesor
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Reg</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asesors as $index => $asesor)
                    <tr>
                        <td>{{ $asesors->firstItem() + $index }}</td>
                        <td>{{ $asesor->no_reg }}</td>
                        <td>{{ $asesor->nama }}</td>
                        <td>{{ $asesor->email }}</td>
                        <td>{{ $asesor->no_telepon }}</td>
                        <td>
                            <span class="badge bg-{{ $asesor->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($asesor->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('asesor.show', $asesor) }}" class="btn btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('asesor.edit', $asesor) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('asesor.destroy', $asesor) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $asesors->links() }}
        </div>
    </div>
</div>
@endsection