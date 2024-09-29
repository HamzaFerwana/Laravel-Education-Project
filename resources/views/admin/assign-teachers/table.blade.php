@extends('admin.master')
@section('title', 'Assign Teachers | ' . env('APP_NAME'))

@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
</div>
@endif
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Courses</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>
                        @foreach ($teacher->courses as $course)
                        {{ $course->title }}{{ !$loop->last ? ',' : ''}}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.assign-teachers-edit', $teacher->id) }}" class="btn btn-primary">Edit Teacher Courses</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
