@extends('admin.master')
@section('title', 'Hero Section | ' . env('APP_NAME'))

@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
</div>
@endif
<form action="{{ route('admin.hero-section-data') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-2">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', settings()->get('title')) }}" class="form-control @error('title')
    is-invalid
    @enderror">
    @error('title')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-2">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control @error('image')
    is-invalid
    @enderror">
    @error('image')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-4">
    <h2>Current Image: </h2>
<img src="{{ asset(settings()->get('image')) }}" height="150" width="150">
</div>

<button class="btn btn-success">Submit</button>
</form>

@endsection
