@extends('admin.layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
    <h4>Edit Pelanggan</h4>

    <form action="{{ route('admin.pelanggans.update', $pelanggan) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.pelanggans._form', [
            'pelanggan' => $pelanggan,
            'categories' => $categories
        ])

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pelanggans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
