@extends('admin.layouts.app')

@section('title', 'Daftar Categories')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h4>Daftar Categories</h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            Tambah Category
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
                <th>Nama Category</th>
                <th>Jumlah Pelanggan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $i => $category)
                <tr>
                    <td>{{ $categories->firstItem() + $i }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <span class="badge bg-info">
                            {{ $category->pelanggans_count ?? $category->pelanggans()->count() }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus category ini?');">
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
                    <td colspan="5" class="text-center text-muted">
                        Belum ada data category
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $categories->links() }}
    </div>
@endsection
