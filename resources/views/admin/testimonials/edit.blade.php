@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="mb-3">
    <h4>Edit Testimonial</h4>
</div>

<form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.testimonials._form')
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
