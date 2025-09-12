@extends('admin.layouts.app')

@section('title', 'Tambah Partner')

@section('content')
    <h4>Tambah Partner</h4>
    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.partners._form', ['partner' => null])
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
