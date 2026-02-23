@extends('admin.layouts.app')

@section('title', 'Daftar Testimonial')

@section('content')
    <h4>Daftar Testimonial</h4>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mb-3">Tambah Testimonial</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Perusahaan</th>
                <th>Isi</th>
                <th>Tanggal Publikasi</th>
                <th>Urutan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $testimonial->name }}</td>
                <td>
                    @if($testimonial->photo_path)
                        <img src="{{ asset('storage/' . $testimonial->photo_path) }}" alt="" style="max-width: 100px;">
                    @endif
                </td>
                <td>{{ $testimonial->title }}</td>
                <td>{{ $testimonial->company }}</td>
                <td>{{ Str::limit($testimonial->body, 50) }}</td>
                <td>{{ $testimonial->published_at ? $testimonial->published_at->format('Y-m-d') : '' }}</td>
                <td>{{ $testimonial->sort }}</td>
                <td>
                    @if($testimonial->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus testimonial ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $testimonials->links() }}
@endsection
