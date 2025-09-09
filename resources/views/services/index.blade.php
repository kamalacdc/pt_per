@extends('layouts.app')
@section('title','Layanan')
@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Layanan</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($services as $svc)
      <a href="{{ route('layanan.show',$svc->slug) }}" class="p-5 rounded-xl border bg-white">
        <h3 class="font-semibold">{{ $svc->name }}</h3>
        <p class="text-sm text-gray-500">{{ $svc->excerpt }}</p>
      </a>
    @empty
      <p>Belum ada layanan.</p>
    @endforelse
  </div>
</div>
@endsection
