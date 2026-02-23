@extends('admin.layouts.app')

@section('title', 'Daftar Partners')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4>Daftar Partners</h4>
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Tambah Partner</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Logo</th>
            <th>Nama</th>
            <th>URL</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($partners as $i => $partner)
            <tr>
                <td>{{ $partners->firstItem() + $i }}</td>
                <td style="width:120px">
                    @if($partner->logo_path)
                        <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="" style="max-width:100px; height:auto;">
                    @endif
                </td>
                <td>{{ $partner->name }}</td>
                <td>{{ $partner->url }}</td>
                <td>
                    @if($partner->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus partner ini?');">
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
    {{ $partners->links() }}
</div>
@endsection
