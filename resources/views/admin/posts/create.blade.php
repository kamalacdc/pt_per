@extends('admin.layouts.app')

@section('title', 'Tambah Post')

@section('content')
<div class="mb-3">
    <h4>Tambah Post</h4>
</div>

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.posts._form')
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
