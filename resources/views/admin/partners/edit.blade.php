@extends('admin.layouts.app')

@section('title', 'Edit Partner')

@section('content')
    <h4>Edit Partner</h4>
    <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.partners._form', ['partner' => $partner])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
