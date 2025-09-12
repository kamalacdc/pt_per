@extends('admin.layouts.app')

@section('title', 'Tambah Hero Carousel')

@section('content')
    <h4>Tambah Hero Carousel</h4>
    <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.carousel._form', ['carousel' => null])
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
