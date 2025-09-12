@extends('admin.layouts.app')

@section('title', 'Daftar Halaman')

@section('content')
    <h4>Daftar Halaman</h4>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary mb-3">Tambah Halaman</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Slug</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>{{ $page->slug }}</td>
                <td>
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus halaman ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pages->links() }}
@endsection
