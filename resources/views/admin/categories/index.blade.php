@extends('admin.master')
@section('title', 'Categories | ' . env('APP_NAME'))

@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
</div>
@endif
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                    @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th colspan="3" class="text-center">No Data Found.</th>
            </tr>
            @endforelse
        </tbody>
    </table>

















@endsection
