@extends('layouts.app')

@section('title','Beranda')

@section('content')
<section class="bg-white">
  <div class="max-w-6xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-4">Selamat datang</h1>
    <p class="text-gray-600 mb-8">Ini adalah starter Beranda. Ganti dengan hero slider, layanan, about, projects, galeri, testimoni, blog, dan kontak.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach($services as $svc)
        <a href="{{ route('layanan.show',$svc->slug) }}" class="p-5 rounded-xl border bg-white">
          <h3 class="font-semibold">{{ $svc->name }}</h3>
          <p class="text-sm text-gray-500">{{ $svc->excerpt }}</p>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endsection
