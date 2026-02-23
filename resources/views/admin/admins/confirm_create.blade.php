@extends('admin.layouts.app')

@section('title', 'Konfirmasi Pembuatan Admin')

@section('content')
<div class="container">
    <h2>Konfirmasi Pembuatan Admin Baru</h2>
    <p>Masukkan password master untuk melanjutkan pembuatan admin baru.</p>
    <form action="{{ route('admin.admins.confirm.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="master_password" class="form-label">Password Master</label>
            <input type="password" class="form-control" id="master_password" name="master_password" required>
            @error('master_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
        <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
