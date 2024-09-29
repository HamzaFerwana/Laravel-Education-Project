@extends('site.master')
@section('title', 'My Courses | ' . env('APP_NAME'))

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach (Auth::user()->courses as $course)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="course align-self-stretch">
                            <a class="img" style="background-image: url({{ asset($course->image) }})"></a>
                            <div class="text p-4">
                                <p class="category"><span>{{ $course->category->name }}</span> <span
                                        class="price">&euro;{{ $course->price }}</span></p>
                                <h3 class="mb-3">{{ $course->title }}</h3>
                                <p>{{ $course->description }}</p>
                                    <p><a class="btn btn-danger" href="{{ route('genius.unenroll', $course->id) }}">Unenroll</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>













@endsection
