@extends('admin.layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
    <h4>Tambah Layanan</h4>
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.services._form', ['service' => null])
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
