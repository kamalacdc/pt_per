@extends('admin.layouts.app')

@section('title', 'Daftar Branches')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4>Daftar Branches</h4>
    <a href="{{ route('admin.branches.create') }}" class="btn btn-primary">Tambah Branch</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Sort</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($branches as $i => $branch)
            <tr>
                <td>{{ $branches->firstItem() + $i }}</td>
                <td>{{ $branch->name }}</td>
                <td>{{ Str::limit($branch->address, 50) }}</td>
                <td>{{ $branch->phone }}</td>
                <td>{{ $branch->email }}</td>
                <td>{{ $branch->sort }}</td>
                <td>
                    <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus branch ini?');">
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
    {{ $branches->links() }}
</div>
@endsection
