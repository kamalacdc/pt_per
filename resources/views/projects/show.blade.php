@extends('layouts.app')
@section('title',$project->title)
@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-2">{{ $project->title }}</h1>
  <p class="text-gray-500 mb-6">{{ $project->location }} {{ $project->year ? '• '.$project->year : '' }}</p>
  <div class="prose max-w-none">{!! nl2br(e($project->content)) !!}</div>
  @if($project->partners->count())
    <div class="mt-8">
      <h3 class="font-semibold mb-2">Mitra</h3>
      <ul class="list-disc ml-5">
        @foreach($project->partners as $pt)
          <li>{{ $pt->name }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</div>
@endsection
