@extends('site.master')
@section('title', 'About | ' . env('APP_NAME'))

@section('content')

    <div class="hero-wrap hero-wrap-2" style="background-image: url({{ asset(settings()->get('hero_section_image')) }}); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('genius.index') }}">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread">About</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex ftco-animate">
    				<div class="img img-about align-self-stretch" style="background-image: url({{ asset(settings()->get('description_section_image')) }}); width: 100%;"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 ftco-animate">
                    {!! settings()->get('description') !!}
    			</div>
    		</div>
    	</div>
    </section>

<x-vimeoVideo></x-vimeoVideo>



@endsection


