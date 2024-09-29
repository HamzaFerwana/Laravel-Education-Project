@extends('admin.master')
@section('title', 'About | ' . env('APP_NAME'))

@section('content')
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif
    <form action="{{ route('admin.about-data') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label for="hero-section-image">Hero Section Image</label>
            <input type="file" name="hero_section_image" id="hero-section-image"
                class="form-control @error('hero_section_image')
    is-invalid
    @enderror">
            @error('hero_section_image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-2">
            <img src="{{ asset(settings()->get('hero_section_image')) }}" height="200" width="200">
        </div>
        <div class="mb-2">
            <label for="description-section-image">Description Section Image</label>
            <input type="file" name="description_section_image" id="description-section-image"
                class="form-control @error('description_section_image')
    is-invalid
    @enderror">
            @error('description_section_image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-2">
            <img src="{{ asset(settings()->get('description_section_image')) }}" height="200" width="200">
        </div>

        <div class="mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description')
    is-invalid
    @enderror"
                placeholder="Description">{{ old('description', settings()->get('description')) }}</textarea>
            @error('description')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="video-description">Video Description</label>
            <input type="text" name="video_description" id="video-description"
                value="{{ old('video_description', settings()->get('video_description')) }}" placeholder="Video Description"
                class="form-control @error('video_description')
            is-invalid
            @enderror">
            @error('video_description')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="video-link">Video link</label>
            <input type="text" name="video_link" id="video-link"
                value="{{ old('video_link', settings()->get('video_link')) }}" placeholder="Video link"
                class="form-control @error('video_link')
            is-invalid
            @enderror">
            @error('video_link')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="mb-2">
                    <label for="satisfied-students">Satisfied Students</label>
                    <input type="text" name="satisfied_students" id="satisfied-students"
                        value="{{ old('satisfied_students', settings()->get('satisfied_students')) }}"
                        placeholder="Satisfied Students"
                        class="form-control @error('satisfied_students')
                    is-invalid
                    @enderror">
                    @error('satisfied_students')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-2">
                    <label for="courses-completed">Courses Completed</label>
                    <input type="text" name="courses_completed" id="courses-completed"
                        value="{{ old('courses_completed', settings()->get('courses_completed')) }}"
                        placeholder="Courses Completed"
                        class="form-control @error('courses_completed')
                    is-invalid
                    @enderror">
                    @error('courses_completed')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-2">
                    <label for="experts-advisors">Experts Advisors</label>
                    <input type="text" name="experts_advisors" id="experts-advisors"
                        value="{{ old('experts_advisors', settings()->get('experts_advisors')) }}"
                        placeholder="Experts Advisors"
                        class="form-control @error('experts_advisors')
                    is-invalid
                    @enderror">
                    @error('experts_advisors')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-2">
                    <label for="schools">Schools</label>
                    <input type="text" name="schools" id="schools"
                        value="{{ old('schools', settings()->get('schools')) }}" placeholder="Schools"
                        class="form-control @error('schools')
                    is-invalid
                    @enderror">
                    @error('schools')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>
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
