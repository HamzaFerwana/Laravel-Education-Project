@extends('admin.master')
@section('title', 'Create Category | ' . env('APP_NAME'))

@section('content')

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" class="form-control @error('name')
            is-invalid
        @enderror">
        @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>
    <button class="btn btn-success">Submit</button>
</form>
















@endsection
