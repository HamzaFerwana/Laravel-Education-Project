@extends('admin.master')
@section('title', 'Create Teacher | ' . env('APP_NAME'))

@section('content')

    <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}"
                class="form-control @error('name')
            is-invalid
            @enderror">
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="academic_title">Academic Title</label>
            <input type="text" name="academic_title" id="academic_title" placeholder="Academic Title"
                value="{{ old('academic_title') }}"
                class="form-control @error('academic_title')
            is-invalid
            @enderror">
            @error('academic_title')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="image">Image</label>
            <input type="file" name="image" id="image"
                class="form-control @error('image')
            is-invalid
            @enderror">
            @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="tw_link">Twitter Link</label>
            <input type="text" name="tw_link" id="tw_link" placeholder="Twitter Link" value="{{ old('tw_link') }}"
                class="form-control @error('tw_link')
            is-invalid
            @enderror">
            @error('tw_link')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="insta_link">Instagram Link</label>
            <input type="text" name="insta_link" id="insta_link" placeholder="Instagram Link"
                value="{{ old('insta_link') }}"
                class="form-control @error('insta_link')
            is-invalid
            @enderror">
            @error('insta_link')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="about">About</label>
            <textarea name="about" id="about" placeholder="About"
                class="form-control @error('about')
            is-invalid
            @enderror">{{ old('about') }}</textarea>
            @error('about')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-success">Submit</button>
    </form>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: ['code']
        });
    </script>
@endsection


