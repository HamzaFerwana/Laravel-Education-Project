@extends('admin.master')
@section('title', 'Edit Course | ' . env('APP_NAME'))

@section('content')

    <h1>Edit Course</h1>

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-2">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $course->title) }}"
                class="form-control @error('title')
            is-invalid
        @enderror">
            @error('title')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-2">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description"
                value="{{ old('description', $course->description) }}"
                class="form-control @error('description')
            is-invalid
        @enderror">
            @error('description')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-2">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Price" value="{{ old('price', $course->price) }}"
                class="form-control @error('price')
            is-invalid
        @enderror">
            @error('price')
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
            <label for="category">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id')
            is-invalid
            @enderror">
                <option value="" selected disabled hidden> -- Select Category -- </option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-success">Submit</button>
    </form>

@endsection

@section('scripts')
<script>
let category = document.querySelector('#category_id');
let old = '{{ old("category_id", $course->category_id) }}';
category.value = old;
</script>
@endsection
