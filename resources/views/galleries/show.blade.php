@extends('layouts.app')
@section('title',$gallery->title)
@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">{{ $gallery->title }}</h1>
  <p class="text-gray-600 mb-6">{{ $gallery->description }}</p>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach($gallery->items as $it)
      <img src="{{ asset('storage/'.$it->path) }}" alt="{{ $it->caption }}" class="w-full h-40 object-cover rounded border">
    @endforeach
  </div>
</div>
@endsection
