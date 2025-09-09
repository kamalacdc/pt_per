@extends('layouts.app')
@section('title','Project')
@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Project</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($projects as $p)
      <a href="{{ route('project.show',$p->slug) }}" class="block rounded-xl border bg-white p-4">
        <h3 class="font-semibold">{{ $p->title }}</h3>
        <p class="text-sm text-gray-500">{{ $p->location }} {{ $p->year ? '• '.$p->year : '' }}</p>
      </a>
    @endforeach
  </div>
  <div class="mt-6">{{ $projects->links() }}</div>
</div>
@endsection
