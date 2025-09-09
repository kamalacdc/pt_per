@extends('layouts.app')
@section('title','Testimoni')
@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Testimoni</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($testimonials as $t)
      <div class="rounded-xl border bg-white p-5">
        <p class="text-gray-700 mb-3">“{{ $t->body }}”</p>
        <div class="text-sm font-semibold">{{ $t->name }}</div>
        <div class="text-xs text-gray-500">{{ $t->title }} {{ $t->company ? '• '.$t->company : '' }}</div>
      </div>
    @endforeach
  </div>
  <div class="mt-6">{{ $testimonials->links() }}</div>
</div>
@endsection
