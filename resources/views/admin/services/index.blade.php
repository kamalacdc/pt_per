@extends('admin.layouts.app')

@section('title', 'Daftar Layanan')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4>Daftar Layanan</h4>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Tambah Layanan</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Aktif</th>
            <th>Urut</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $i => $service)
            <tr>
                <td>{{ $services->firstItem() + $i }}</td>
                <td style="width:120px">
                    @if($service->image)
                        <img src="{{ asset('storage/'.$service->image) }}" alt="" style="max-width:100px; height:auto;">
                    @endif
                </td>
                <td>{{ $service->title }}</td>
                <td>{{ $service->is_active ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $service->sort }}</td>
                <td>
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus layanan ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $services->links() }}
</div>
@endsection
