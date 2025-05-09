@extends('frontend.layout.app')
@section('content')
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

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
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
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
                        <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
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
                        <a href="#" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <br>
    <br>

    <!-- Login Start -->
    <div class="container-fluid login py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <h2 class="text-center mb-4">Register</h2>

                        <!-- Tabs for selecting registration type -->
                        <ul class="nav nav-tabs" id="registerTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="customer-tab" data-bs-toggle="tab" href="#customer"
                                    role="tab" aria-controls="customer" aria-selected="true">Register as Customer</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="vendor-tab" data-bs-toggle="tab" href="#vendor" role="tab"
                                    aria-controls="vendor" aria-selected="false">Register as Vendor</a>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content mt-4" id="registerTabsContent">
                            <!-- Customer Registration Form -->
                            <div class="tab-pane fade show active" id="customer" role="tabpanel"
                                aria-labelledby="customer-tab">
                                <form action="" method="POST">
                                    @csrf
                                    <!-- Email Field -->
                                    <div class="mb-4">
                                        <input type="name" class="w-100 form-control py-3"
                                            placeholder="Enter Your name" name="name" required>
                                    </div>


                                    <div class="mb-4">
                                        <input type="email" class="w-100 form-control py-3"
                                            placeholder="Enter Your Email" name="email" required>
                                    </div>

                                    <div class="mb-4">
                                        <input type="phone" class="w-100 form-control py-3"
                                            placeholder="Enter Your phone" name="phone" required>
                                    </div>

                                    <div class="mb-4">
                                        <input type="password" class="w-100 form-control py-3"
                                            placeholder="Enter Your Password" name="password" required>
                                    </div>

                                    <div class="mb-4">
                                        <input type="password" class="w-100 form-control py-3"
                                            placeholder="Enter Your Password" name="password" required>
                                    </div>

                                    <!-- Login Button -->
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary py-3" type="submit">Register as Customer</button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="{{ route('login') }}" class="text-muted">Already have an account? Login
                                            here</a>
                                    </div>
                                </form>
                            </div>

                            <!-- Vendor Registration Form -->
                            <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                                <form action="{{ route('vendorregister') }}" method="POST">
                                    @csrf
                                    <!-- Vendor Email Field -->

                                    <div class="mb-4">
                                        <input type="name" class="w-100 form-control py-3"
                                            placeholder="Enter Your name" name="name" required>
                                    </div>


                                    <div class="mb-4">
                                        <input type="email" class="w-100 form-control py-3"
                                            placeholder="Enter Your Email" name="email" required>
                                    </div>

                                    <div class="mb-4">
                                        <input type="phone" class="w-100 form-control py-3"
                                            placeholder="Enter Your phone" name="phone" required>
                                    </div>

                                    <!-- Vendor Password Field -->


                                    <div class="mb-4">
                                        <input type="text" class="w-100 form-control py-3"
                                            placeholder="Enter Your GST" name="gst" required>
                                    </div>

                                    <div class="mb-4">
                                        <input type="password" class="w-100 form-control py-3" id="pwd"
                                            placeholder="Password" name="password" oninput="validatePassword(this)">

                                    </div>

                                    <div class="mb-4">
                                        <input type="password" class="w-100 form-control py-3" id="pwd-confirm"
                                            placeholder="Confirm password" name="password_confirmation"
                                            oninput="validatePassword(this)">
                                    </div>

                                    <!-- Vendor Registration Button -->
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary py-3" type="submit">Register as Vendor</button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="{{ route('login') }}" class="text-muted">Already have an account? Login
                                            here</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
@endsection
