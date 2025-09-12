@extends('admin.layouts.app')

@section('title', 'Edit Halaman')

@section('content')
    <h4>Edit Halaman</h4>
    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.pages._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
