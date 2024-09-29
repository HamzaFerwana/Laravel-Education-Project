@extends('admin.master')
@section('title', 'Assign Teachers | ' . env('APP_NAME'))

@section('content')
<?php
use App\Models\Category;
?>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.assign-teachers-data') }}" method="POST">
        @csrf

        <div class="row mb-5" style="display: flex; flex-direction: column; gap: 20px;">

            <div class="col-md-6">
                <label for="teacher_id"><h4>Select Teacher: </h4></label>
                <select name="teacher_id" id="teacher_id"
                    class="form-control">
                <option value="" selected disabled hidden> -- Select Teacher -- </option>
                @foreach ($teachers as $title => $title_teachers)
                <optgroup label="{{ $title }}">
                    @foreach ($title_teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </optgroup>
                @endforeach
                </select>
            </div>
            <br>
            <?php $index = 0; ?>
            <div class="col-md-6">
                <h4>Select Courses: </h4>
                <br>
                @foreach ($courses as $category => $title_courses)
                <h3>{{ Category::findOrFail($category)->name }}</h3>
                @foreach ($title_courses as $course)
                <input type="checkbox" name="courses[]" id="courses-{{ $index }}" value="{{ $course->id }}" {{ is_array(old('courses')) && in_array($course->id, old('courses')) ? 'checked' : '' }}>
                <label for="courses-{{ $index }}">{{ $course->title }}</label>
                <br>
                <?php $index++ ?>
                @endforeach
                <hr>
                @endforeach
            </div>

        </div>

        <button class="btn btn-success">Submit</button>
    </form>
@endsection

@section('scripts')
<script>
let teacher_id = document.getElementById('teacher_id');
let old = '{{ old("teacher_id") }}';
teacher_id.value = old;
</script>
@endsection
