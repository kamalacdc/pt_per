@extends('admin.layouts.app')

@section('title', 'Tambah Project')

@section('content')
    <h4>Tambah Project</h4>
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.categories._form', ['project' => null])
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
