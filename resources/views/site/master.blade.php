<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', env('APP_NAME'))</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('site-assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('site-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('site-assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('site-assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('site-assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('site-assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/style.css') }}">
    @yield('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('genius.index') }}"><i class="flaticon-university"></i>Genius
                <br><small>University</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('genius.index') ? 'active' : '' }}"><a
                            href="{{ route('genius.index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item {{ request()->routeIs('genius.about') ? 'active' : '' }}"><a
                            href="{{ route('genius.about') }}" class="nav-link">About</a></li>
                    <li
                        class="nav-item {{ request()->routeIs('genius.courses') || request()->routeIs('genius.enroll') ? 'active' : '' }}">
                        <a href="{{ route('genius.courses') }}" class="nav-link">Courses</a></li>
                    <li
                        class="nav-item {{ request()->routeIs('genius.teachers') || request()->routeIs('genius.single-teacher') ? 'active' : '' }}">
                        <a href="{{ route('genius.teachers') }}" class="nav-link">Teachers</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('genius.contact') ? 'active' : '' }}"><a
                            href="{{ route('genius.contact') }}" class="nav-link">Contact</a></li>
                    @auth
                        <li class="nav-item {{ request()->routeIs('genius.my-courses') ? 'active' : '' }}"><a
                                href="{{ route('genius.my-courses') }}" class="nav-link"> My Enrolled Courses</a></li>
                    @endauth
                    @guest

                        <li class="nav-item cta ml-5"><a href="{{ route('login') }}"
                                class="nav-link"><span>Login</span></a>
                        </li>
                        <li class="nav-item cta ml-2"><a href="{{ route('register') }}"
                                class="nav-link"><span>Register</span></a>
                        </li>
                    @endguest
                    @auth
                        <form action="{{ route('logout') }}" hidden method="POST" id="logout-form">
                            @csrf
                        </form>
                        <li class="nav-item cta ml-5"><a class="nav-link" style="background-color: purple"><span>{{ Auth::user()->name }}</span></a>
                        </li>
                        <li class="nav-item cta ml-3"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                class="nav-link"><span>Logout</span></a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')

    <footer class="ftco-footer ftco-bg-dark ftco-section img"
        style="background-image: url({{ asset('site-assets/images/bg_2.jpg') }}); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2><a class="navbar-brand" href="{{ route('genius.index') }}"><i
                                    class="flaticon-university"></i>Genius <br><small>University</small></a></h2>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('site-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/aos.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('site-assets/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>
