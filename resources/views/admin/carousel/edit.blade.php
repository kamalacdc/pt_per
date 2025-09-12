@extends('admin.layouts.app')

@section('title', 'Edit Hero Carousel')

@section('content')
    <h4>Edit Hero Carousel</h4>
    <form 
        action="{{ route('admin.carousel.update', $carousel) }}" 
        method="POST" 
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.carousel._form', ['carousel' => $carousel])

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
