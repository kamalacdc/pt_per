

@extends('admin.layouts.app')

@section('title', 'Daftar Hero Carousel')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4>Daftar Hero Carousel</h4>
    <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary">Tambah Gambar</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Urut</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carousels as $i => $item)
            <tr>
                <td>{{ $carousels->firstItem() + $i }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ Str::limit($item->description, 50) }}</td>
                <td style="width:140px">
                    @if($item->filename)
                        <img
                            src="{{ asset('storage/carousel/' . $item->filename) }}"
                            alt="Carousel {{ $item->id }}"
                            style="max-width:120px; height:auto;">
                    @endif
                </td>
                <td>{{ $item->sort_order }}</td>
                <td>
                    <a
                        href="{{ route('admin.carousel.edit', $item) }}"
                        class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form
                        action="{{ route('admin.carousel.destroy', $item) }}"
                        method="POST"
                        style="display:inline"
                        onsubmit="return confirm('Hapus gambar ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $carousels->links() }}
</div>
@endsection
```