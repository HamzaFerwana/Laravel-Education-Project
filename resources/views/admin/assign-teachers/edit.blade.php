@extends('admin.master')
@section('title', 'Edit Teacher\'s Courses | ' . env('APP_NAME'))

@section('content')
    <?php
    use App\Models\Category;
    $tCourses = [];
    ?>
    @foreach ($teacher->courses as $course)
        @php
            array_push($tCourses, $course->id);
        @endphp
    @endforeach
    <hr>
    <h2>Teacher: {{ $teacher->name }}</h2>
    <hr>
    <form action="{{ route('admin.assign-teachers-edit-data', $teacher->id) }}" method="POST">
        @csrf

        <div class="row mb-5" style="display: flex; flex-direction: column; gap: 20px;">

            <?php $index = 0; ?>
            <div class="col-md-6">
                <h4>Select Courses: </h4>
                <br>
                @foreach ($courses as $category => $title_courses)
                    <h3>{{ Category::findOrFail($category)->name }}</h3>
                    @foreach ($title_courses as $course)
                        <input type="checkbox" name="courses[]" id="courses-{{ $index }}" value="{{ $course->id }}" {{ in_array($course->id, $tCourses) ? 'checked' : '' }}>
                        <label for="courses-{{ $index }}">{{ $course->title }}</label>
                        <br>
                        <?php $index++; ?>
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
        let old = '{{ old('teacher_id') }}';
        teacher_id.value = old;
    </script>
@endsection
