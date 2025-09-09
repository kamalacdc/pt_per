@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">{{ $post->created_at->format('d M Y') }}</p>

    @if($post->image)
        <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid mb-4" alt="{{ $post->title }}">
    @endif

    <div>
        {!! $post->content !!}
    </div>
</div>
@endsection
