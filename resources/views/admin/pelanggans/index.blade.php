@extends('admin.layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h4>Daftar Pelanggan</h4>
        <a href="{{ route('admin.pelanggans.create') }}" class="btn btn-primary">
            Tambah Pelanggan
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nama Project</th>
                <th>Category</th>
                <th>Tanggal</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Perusahaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggans as $i => $pelanggan)
                <tr>
                    <td>{{ $pelanggans->firstItem() + $i }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->title }}</td>
                    <td>
                        <span class="badge bg-info">
                            {{ $pelanggan->category->name ?? '-' }}
                        </span>
                    </td>
                    <td>{{ $pelanggan->tanggal_pelanggan }}</td>
                    <td>{{ $pelanggan->email ?? '-' }}</td>
                    <td>{{ $pelanggan->phone ?? '-' }}</td>
                    <td>{{ $pelanggan->perusahaan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.pelanggans.edit', $pelanggan) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.pelanggans.destroy', $pelanggan) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus pelanggan ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        Belum ada data pelanggan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $pelanggans->links() }}
    </div>
@endsection
