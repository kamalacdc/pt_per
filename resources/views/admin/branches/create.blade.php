@extends('admin.layouts.app')

@section('title', 'Tambah Branch')

@section('content')
<div class="mb-3">
    <h4>Tambah Branch</h4>
</div>

<form action="{{ route('admin.branches.store') }}" method="POST">
    @csrf
    @include('admin.branches._form')
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
