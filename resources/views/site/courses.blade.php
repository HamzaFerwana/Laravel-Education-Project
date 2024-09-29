@extends('site.master')
@section('title', 'Courses | ' . env('APP_NAME'))

@section('content')
    <div class="hero-wrap hero-wrap-2"
        style="background-image: url({{ asset('site-assets/images/bg_2.jpg') }}); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('genius.index') }}">Home</a></span>
                        <span>Courses</span>
                    </p>
                    <h1 class="mb-3 bread">Courses</h1>
                </div>
            </div>
        </div>
    </div>


        @include('site.parts.courses')
@endsection


{{-- @section('scripts')
    <script>
        $('.stat').on('click', '.var a', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                type: 'get',
                url: url,
                success: function(res) {
                    console.log(res);
                    $('.stat').html(res);
                },
                error: function(err) {
                    console.log(err)
                }
            });


            console.log(url);

        });
    </script>
@endsection --}}
