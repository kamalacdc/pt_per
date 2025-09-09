@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Blog / Posts</h1>

    @if($posts->count())
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            <p class="text-muted small">{{ $post->created_at->format('d M Y') }}</p>
                            <p>{{ Str::limit($post->excerpt, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <p>Belum ada postingan.</p>
    @endif
</div>
@endsection
