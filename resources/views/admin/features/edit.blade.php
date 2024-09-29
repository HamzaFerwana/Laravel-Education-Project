@extends('admin.master')
@section('title', 'Edit Feature | ' . env('APP_NAME'))

@section('content')


    <h1>Edit Feature</h1>

    <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-2">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $feature->title) }}"
                class="form-control @error('title')
        is-invalid
        @enderror">
            @error('title')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-2">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Discription"
                value="{{ old('description', $feature->description) }}"
                class="form-control @error('description')
        is-invalid
        @enderror">
            @error('description')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="image">image</label>
            <input type="file" name="image" id="image"
                class="form-control @error('image')
        is-invalid
        @enderror">
            @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <h2>Current Image: </h2>
            <img src="{{ asset($feature->image) }}" height="200" width="200" id="feat-image">
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
















@endsection
