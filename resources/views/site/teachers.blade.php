@extends('site.master')
@section('title', 'Teachers | ' . env('APP_NAME'))

@section('content')
    <div class="hero-wrap hero-wrap-2"
        style="background-image: url({{ asset('site-assets/images/bg_2.jpg') }}); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('genius.index') }}">Home</a></span>
                        <span>Teachers</span></p>
                    <h1 class="mb-3 bread">Teachers</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Teachers</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($teachers as $teacher)
                    <div class="col-lg-4 mb-sm-4 ftco-animate">
                        <div class="staff">
                            <div class="d-flex mb-4">
                                <div class="img" style="background-image: url({{ asset($teacher->image) }});"></div>
                                <div class="info ml-4">
                                    <h3><a href="{{ route('genius.single-teacher', $teacher->id) }}">{{ $teacher->name }}</a></h3>
                                    <span class="position">{{ $teacher->academic_title }}</span>
                                    <p class="ftco-social d-flex">
                                        <a href="{{ $teacher->tw_link }}" target="_blank"
                                            class="d-flex justify-content-center align-items-center"><span
                                                class="icon-twitter"></span></a>
                                        <a href="{{ $teacher->insta_link }}" target="_blank"
                                            class="d-flex justify-content-center align-items-center"><span
                                                class="icon-instagram"></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $teachers->links('vendor.pagination.custom') }}

        </div>
    </section>
@endsection
