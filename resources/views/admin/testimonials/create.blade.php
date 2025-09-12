@extends('admin.layouts.app')

@section('title', 'Tambah Testimonial')

@section('content')
<div class="mb-3">
    <h4>Tambah Testimonial</h4>
</div>

<form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.testimonials._form')
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
