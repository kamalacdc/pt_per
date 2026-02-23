@extends('admin.layouts.app')

@section('title', 'Daftar Projects')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h4>Daftar Projects</h4>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah Project</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>image</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Excerpt</th>
                <th>Content</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $i => $project)
                <tr>
                    <td>{{ $projects->firstItem() + $i }}</td>
                    <td style="width:120px">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt=""
                                style="max-width:100px; height:auto;">
                        @endif
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->excerpt }}</td>
                    <td>{{ $project->content }}</td>
                    <td>
                        @if ($project->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('Hapus project ini?');">
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
        {{ $projects->links() }}
    </div>
@endsection
