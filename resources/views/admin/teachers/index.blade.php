@extends('admin.master')
@section('title', 'Teachers | ' . env('APP_NAME'))

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
                <th>Name</th>
                <th>Title</th>
                <th>Image</th>
                <th>Twitter Link</th>
                <th>Instagram Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->academic_title }}</td>
                    <td><img src="{{ asset($teacher->image) }}" height="100" width="100"></td>
                    <td>{{ $teacher->tw_link }}</td>
                    <td>{{ $teacher->insta_link }}</td>
                    <td>
                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-edit"></i></a>
                        <hr>
                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="8" class="text-center">No Data Found.</th>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection


