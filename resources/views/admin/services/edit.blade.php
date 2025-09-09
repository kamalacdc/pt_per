@extends('admin.layouts.app')

@section('title', 'Edit Layanan')

@section('content')
    <h4>Edit Layanan</h4>
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.services._form', ['service' => $service])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
