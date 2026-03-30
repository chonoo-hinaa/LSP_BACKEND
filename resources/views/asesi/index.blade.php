@extends('layouts.app')

@section('title', 'Data Asesi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Asesi</h5>
        <a href="{{ route('asesi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data Asesi
        </a>
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
                        <th>No Peserta</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tahun Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($asesis as $index => $asesi)
                    <tr>
                        <td>{{ $asesis->firstItem() + $index }}</td>
                        <td>
                            @if($asesi->foto)
                                <img src="{{ asset('storage/' . $asesi->foto) }}" alt="Foto" width="100" height="100" style="object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person" style="font-size: 24px; color: white;"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $asesi->no_peserta }}</td>
                        <td>{{ $asesi->nama }}</td>
                        <td>{{ $asesi->kelas }}</td>
                        <td>{{ $asesi->tahun_aktif }}</td>
                        <td>
                            <a href="{{ route('asesi.show', $asesi) }}" class="btn btn-success btn-sm" title="Lihat">
                                <i class="bi bi-search"></i>
                            </a>
                            <a href="{{ route('asesi.edit', $asesi) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('asesi.destroy', $asesi) }}" method="POST" class="d-inline">
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
                        <td colspan="7" class="text-center py-4">Tidak ada data asesi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $asesis->links() }}
        </div>
    </div>
</div>
@endsection
