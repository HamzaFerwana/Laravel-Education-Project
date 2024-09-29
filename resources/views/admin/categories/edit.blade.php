@extends('admin.master')
@section('title', 'Edit Category | ' . env('APP_NAME'))

@section('content')

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name', $category->name) }}" class="form-control @error('name')
            is-invalid
        @enderror">
        @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>
    <button class="btn btn-success">Submit</button>
</form>
















@endsection
