<section class="ftco-section-3 img" style="background-image: url({{ asset(settings()->get('description_section_image')) }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex justify-content-center">
            <div class="col-md-9 about-video text-center">
                <h2 class="ftco-animate">{{ settings()->get('video_description') }}</h2>
                <div class="video d-flex justify-content-center">
                    <a href="{{ settings()->get('video_link') }}" class="button popup-vimeo d-flex justify-content-center align-items-center"><span class="ion-ios-play"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-counter bg-light" id="section-counter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="{{ settings()->get('satisfied_students') }}">0</strong>
                    <span>Satisfied Students</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="{{ settings()->get('courses_completed') }}">0</strong>
                    <span>Courses Completed</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="{{ settings()->get('experts_advisors') }}">0</strong>
                    <span>Experts Advisors</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="{{ settings()->get('schools') }}">0</strong>
                    <span>Schools</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </div>
</section>
