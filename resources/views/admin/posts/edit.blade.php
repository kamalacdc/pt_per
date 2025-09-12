@extends('admin.layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="mb-3">
    <h4>Edit Post</h4>
</div>

<form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.posts._form')
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
