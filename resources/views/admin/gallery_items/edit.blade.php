@extends('admin.layouts.app')

@section('title', 'Edit Item Galeri')

@section('content')
    <h4>Edit Item Galeri</h4>
    <form action="{{ route('admin.gallery_items.update', $galleryItem) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.gallery_items._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.gallery_items.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
