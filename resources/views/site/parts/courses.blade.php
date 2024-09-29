<div class="stat">
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="course align-self-stretch">
                            <a class="img" style="background-image: url({{ asset($course->image) }})"></a>
                            <div class="text p-4">
                                <p class="category"><span>{{ $course->category->name }}</span> <span
                                        class="price">&euro;{{ $course->price }}</span></p>
                                <h3 class="mb-3">{{ $course->title }}</h3>
                                <p>{{ $course->description }}</p>
                                @if (Auth::check() && Auth::user()->courses->find($course->id))
                                    <p><a class="btn btn-secondary">You are enrolled in this course.</a></p>
                                @else
                                    <p><a href="{{ route('genius.enroll', $course->id) }}"
                                            class="btn btn-primary">Enroll now!</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="var">
                {{ $courses->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
</div>
