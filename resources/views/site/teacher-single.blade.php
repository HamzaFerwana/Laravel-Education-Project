@extends('site.master')
@section('title', $teacher->name . ' | ' . env('APP_NAME'))

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('site-assets/images/bg_2.jpg') }}); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('genius.index') }}">Home</a></span> <span class="mr-2"><a href="{{ route('genius.teachers') }}">Teachers</a></span> <span>Teacher Details</span></p>
            <h1 class="mb-3 bread">Teacher Details</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
        			<div class="col-md-12 mb-5">
        				<div class="teacher-details d-md-flex">
        					<div class="img ftco-animate" style="background-image: url({{ asset($teacher->image) }});"></div>
        					<div class="text ftco-animate">
        						<h3>{{ $teacher->name }}</h3>
	        					<span class="position">{{ $teacher->academic_title }}</span>
	        					<p>{!! $teacher->about !!}</p>
	        					<div class="mt-4">
	        						<h4>Social Link</h4>
		        					<p class="ftco-social d-flex">
				                <a href="{{ $teacher->tw_link }}" class="d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a>

				                <a href="{{ $teacher->insta_link }}" class="d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a>
				              </p>
			              </div>
        					</div>
        				</div>
        			</div>

        		</div>
        	</div>
        </div>
        <h3>Teacher Courses: </h3>
        @foreach ($teacher->courses as $course)
        <h6>{{ $course->title }}</h6>
        @endforeach
      </div>
    </section>
@endsection

