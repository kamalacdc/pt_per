@extends('admin.layouts.app')

@section('title', 'Daftar Gallery Items')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4>Daftar Gallery Items</h4>
    <a href="{{ route('admin.gallery_items.create') }}" class="btn btn-primary">Tambah Gallery Item</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Gallery</th>
            <th>Path</th>
            <th>Type</th>
            <th>Caption</th>
            <th>Category</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($galleryItems as $i => $galleryItem)
            <tr>
                <td>{{ $galleryItems->firstItem() + $i }}</td>
                <td>{{ $galleryItem->gallery->name ?? '' }}</td>
                <td>{{ $galleryItem->path }}</td>
                <td>{{ $galleryItem->type }}</td>
                <td>{{ $galleryItem->caption }}</td>
                <td>{{ $galleryItem->category }}</td>
                <td>
                    <a href="{{ route('admin.gallery_items.edit', $galleryItem) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.gallery_items.destroy', $galleryItem) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus gallery item ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $galleryItems->links() }}
</div>
@endsection
