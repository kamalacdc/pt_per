@extends('layouts.app')
@section('title','Galeri')
@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Galeri</h1>

  <div class="mb-4 space-x-2">
    <a href="{{ route('galeri.index') }}" class="px-3 py-1 rounded border {{ !$category ? 'bg-gray-200' : '' }}">Semua</a>
    @foreach($categories as $cat)
      <a href="{{ route('galeri.index',['category'=>$cat]) }}" class="px-3 py-1 rounded border {{ $category===$cat ? 'bg-gray-200' : '' }}">{{ $cat }}</a>
    @endforeach
  </div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach($items as $it)
      <figure class="bg-white border rounded overflow-hidden">
        <img src="{{ asset('storage/'.$it->path) }}" alt="{{ $it->caption }}" class="w-full h-40 object-cover">
        <figcaption class="p-2 text-sm">{{ $it->caption }}</figcaption>
      </figure>
    @endforeach
  </div>

  <div class="mt-6">{{ $items->links() }}</div>
</div>
@endsection
