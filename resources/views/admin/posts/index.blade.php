@extends('admin.layouts.app')

@section('title', 'Daftar Posts')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4>Daftar Posts</h4>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Tambah Post</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Published At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $i => $post)
            <tr>
                <td>{{ $posts->firstItem() + $i }}</td>
                <td style="width:120px">
                    @if($post->thumb_path)
                        <img src="{{ asset('storage/' . $post->thumb_path) }}" alt="" style="max-width:100px; height:auto;">
                    @endif
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->excerpt, 50) }}</td>
                <td>{{ $post->published_at ? $post->published_at->format('Y-m-d') : '' }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus post ini?');">
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
    {{ $posts->links() }}
</div>
@endsection
