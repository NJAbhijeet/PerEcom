@extends('frontend.layout.app')
@section('content')
    <style>
        /* General reset and body style */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo h1 {
            font-size: 1.8rem;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* About Us Section */
        .about {
            padding: 40px;
            text-align: center;
            background-color: #ffffff;
        }

        .about h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .about-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            gap: 20px;
        }

        .about-image {
            width: 400px;
            height: auto;
            border-radius: 8px;
        }

        .about-text {
            max-width: 600px;
            text-align: left;
        }

        .about-text h3 {
            font-size: 1.5rem;
            margin-top: 20px;
            color: #333;
        }

        .about-text p {
            font-size: 1rem;
            margin-top: 10px;
            color: #666;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        footer p {
            font-size: 0.9rem;
        }
    </style>

    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">123 Street, New York</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">Email@Example.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="{{route('privacy')}}" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="{{route('terms')}}" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="{{ route('index') }}" class="navbar-brand">
                    <h1 class="text-primary display-6">Fruitables</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ route('shop') }}" class="nav-item nav-link">Shop</a>
                        <a href="{{ route('testimonials') }}" class="nav-item nav-link">Testimonial</a>
                        <a href="{{ route('contacts') }} " class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i></button>
                        <a href="#" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                        </a>

                        <a href="#" class="position-relative me-4 my-auto">
                            <i class="fa fa-heart fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                        </a>

                        <a href="{{route('login')}}" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <section class="about">
        <h2>About Us</h2>
        <div class="about-content">
            <img style="width:400px; height:400px" src="{{ asset('frontend/img/hero-img-1.png') }}" alt="Company Image"
                class="about-image">
            <div class="about-text">
                <h3>Our Story</h3>
                <p>Founded in 2010, our company has grown from a small startup to a global leader in our field. We believe
                    in passion, hard work, and dedication, which has allowed us to continuously evolve and improve.</p>
            </div>
        </div>
    </section>
@endsection
