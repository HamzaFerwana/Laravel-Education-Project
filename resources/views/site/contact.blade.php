@extends('site.master')
@section('title', 'Contact | ' . env('APP_NAME'))

@section('content')
    <div class="hero-wrap hero-wrap-2"
        style="background-image: url({{ asset('site-assets/images/bg_2.jpg') }}); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('genius.index') }}">Home</a></span>
                        <span>Contact</span>
                    </p>
                    <h1 class="mb-3 bread">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('msg'))
        <div class="alert alert-primary">
            {{ session('msg') }}
        </div>
    @endif
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <h4 class="mb-4">Do you have any questions?</h4>
                    <form action="{{ route('genius.contact-data') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject"
                                value="{{ old('subject') }}">
                        </div>
                        <div class="form-group">

                            <textarea cols="30" rows="7" class="form-control" placeholder="Message" name="message">{{ old('message') }}</textarea>

                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6" id="map"></div>
            </div>
        </div>
    </section>

@endsection
