@extends('layouts.app')
@section('title', $service->name)
@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-4">{{ $service->name }}</h1>
  <div class="prose max-w-none">{!! nl2br(e($service->content)) !!}</div>
</div>
@endsection
