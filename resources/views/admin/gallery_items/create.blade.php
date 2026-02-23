@extends('admin.layouts.app')

@section('title', 'Tambah Item Galeri')

@section('content')
    <h4>Tambah Item Galeri</h4>
    <form action="{{ route('admin.gallery_items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.gallery_items._form', ['galleryItem' => null])
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.gallery_items.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
