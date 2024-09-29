@extends('site.master')
@section('title', 'Enroll | ' . env('APP_NAME'))

@section('content')
    <div class="hero-wrap hero-wrap-2"
        style="background-image: url({{ asset('site-assets/images/bg_2.jpg') }}); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('genius.index') }}">Home</a></span> <span
                            class="mr-2"><a href="{{ route('genius.courses') }}">Courses</a></span> <span>Enroll</span>
                    </p>
                    <h1 class="mb-3 bread">Enroll</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex ftco-animate">
                    <div class="course align-self-stretch">
                        <a class="img" style="background-image: url({{ asset($course->image) }})"></a>
                        <div class="text p-4">
                            <p class="category"><span>{{ $course->category->name }}</span> <span
                                    class="price">&euro;{{ $course->price }}</span></p>
                            <h3 class="mb-3">{{ $course->title }}</h3>
                            <p>{{ $course->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex ftco-animate">
                    <form action="{{ route('genius.checkout', $course->id) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutID }}"></script>
@endsection
