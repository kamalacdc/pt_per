@extends('layouts.app')
@section('title', $page->title ?? 'Halaman')
@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-4">{{ $page->title }}</h1>
  <div class="prose max-w-none">{!! nl2br(e($page->content)) !!}</div>
</div>
@endsection
