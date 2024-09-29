@extends('site.master')
@section('title', 'Home | ' . env('APP_NAME'))

@section('content')

    <div class="hero-wrap" style="background-image: url({{ asset(settings()->get('image')) }}); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">{{ settings()->get('title') }}</h1>
                    <p><a href="{{ route('genius.courses') }}" class="btn btn-secondary px-4 py-3">View Courses</a></p>
                </div>
            </div>
        </div>
    </div>



    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($features as $feat)
                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services p-3 py-4 d-block text-center">
                            <div class="icon d-flex justify-content-center align-items-center mb-3"><img
                                    src="{{ asset($feat->image) }}" height="60" width="60"></div>
                            <div class="media-body px-3">
                                <h3 class="heading">{{ $feat->title }}</h3>
                                <p>{{ $feat->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <x-vimeoVideo></x-vimeoVideo>



@endsection
