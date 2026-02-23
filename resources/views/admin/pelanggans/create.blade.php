@extends('admin.layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
    <h4>Tambah Pelanggan</h4>

    <form action="{{ route('admin.pelanggans.store') }}" method="POST">
        @csrf

        @include('admin.pelanggans._form', [
            'pelanggan' => null,
            'categories' => $categories
        ])

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pelanggans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
