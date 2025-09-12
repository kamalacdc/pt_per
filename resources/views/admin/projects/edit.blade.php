@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('content')
    <h4>Edit Project</h4>
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.projects._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
