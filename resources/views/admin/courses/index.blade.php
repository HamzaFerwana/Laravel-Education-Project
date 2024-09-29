@extends('admin.master')
@section('title', 'Courses | ' . env('APP_NAME'))

@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
</div>
@endif

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td><img src="{{ asset($course->image) }}" height="100" width="100"></td>
                    <td>{{ $course->category->name }}</td>
                    <td>€{{ $course->price }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-edit"></i></a>
                                <hr>
                        <form class="d-inline" action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <th colspan="7" class="text-center">No Data Found.</th>
            </tr>
            @endforelse
        </tbody>
    </table>

















@endsection
