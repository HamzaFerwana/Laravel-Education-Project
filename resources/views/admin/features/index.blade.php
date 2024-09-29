@extends('admin.master')
@section('title', 'Features | ' . env('APP_NAME'))

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
            <th>Title</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($features as $feature)
        <tr>
            <td>{{ $feature->id }}</td>
            <td>{{ $feature->title }}</td>
            <td><img src="{{ asset($feature->image) }}" height="100" width="100"></td>
            <td>{{ $feature->description }}</td>
            <td>
                <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.features.destroy', $feature->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <th colspan="5" class="text-center">No Data Found.</th>
        </tr>
        @endforelse
    </tbody>
</table>









@endsection
