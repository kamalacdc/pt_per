@extends('admin.layouts.app')
@section('title', 'Daftar Carousel')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3 d-flex justify-content-between align-items-center">
     <h4>Daftar Carousel</h4>
    <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary mb-3">Tambah Carousel</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Status</th>
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
                <td>
                    @if($item->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.carousel.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.carousel.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
