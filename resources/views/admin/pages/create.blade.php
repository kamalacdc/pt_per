@extends('admin.layouts.app')

@section('title', 'Tambah Halaman')

@section('content')
    <h4>Tambah Halaman</h4>
    <form action="{{ route('admin.pages.store') }}" method="POST">
        @csrf
        @include('admin.pages._form', ['page' => null])
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
