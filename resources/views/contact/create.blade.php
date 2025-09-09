@extends('layouts.app')
@section('title','Kontak')
@section('content')
<div class="max-w-2xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Hubungi Kami</h1>
  @if(session('status'))
    <div class="p-3 mb-4 border rounded bg-green-50 text-green-700">{{ session('status') }}</div>
  @endif
  <form action="{{ route('contact.store') }}" method="post" class="space-y-4">
    @csrf
    <div>
      <label class="block text-sm mb-1">Nama</label>
      <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name') }}">
      @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
      <label class="block text-sm mb-1">Email</label>
      <input type="email" name="email" class="w-full border rounded p-2" value="{{ old('email') }}">
      @error('email') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
      <label class="block text-sm mb-1">Telepon</label>
      <input type="text" name="phone" class="w-full border rounded p-2" value="{{ old('phone') }}">
    </div>
    <div>
      <label class="block text-sm mb-1">Pesan</label>
      <textarea name="message" rows="5" class="w-full border rounded p-2">{{ old('message') }}</textarea>
      @error('message') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <button class="px-4 py-2 rounded bg-black text-white">Kirim</button>
  </form>
</div>
@endsection
