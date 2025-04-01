@extends('frontend.layout.app')
@section('content')
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
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
                    <a href="{{route('index')}}" class="navbar-brand"><h1 class="text-primary display-6">Fruitables</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('index')}}" class="nav-item nav-link">Home</a>
                            <a href="{{route('shop')}}" class="nav-item nav-link">Shop</a>
                            <a href="{{route('testimonials')}}" class="nav-item nav-link">Testimonial</a>                         
                            <a href="{{route('contacts')}} " class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="{{route('cart')}}" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a>
                            <a href="{{route('wishlist')}}" class="position-relative me-4 my-auto">
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


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Wishlist</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Wishlist</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


      <!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                        <th scope="col">Add To Cart</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="Product Image">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">Big Banana</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">2.99 $</p>
                        </td>

                        <td>
                            <button class="btn btn-md rounded-circle bg-light border mt-4" style="padding: 8px; border-radius: 50%; background-color: #f8f9fa; border-color: #dee2e6;" aria-label="Remove item from cart">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>

                        <td>
                            <button class="btn btn-md rounded-circle bg-light border mt-4">
                                <i class="fas fa-shopping-cart"></i>
                              </button>
                        </td>

                    </tr>

                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="Product Image">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">Big Banana</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">2.99 $</p>
                        </td>

                        <td>
                            <button class="btn btn-md rounded-circle bg-light border mt-4" style="padding: 8px; border-radius: 50%; background-color: #f8f9fa; border-color: #dee2e6;" aria-label="Remove item from cart">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>

                        <td>
                            <button class="btn btn-md rounded-circle bg-light border mt-4">
                                <i class="fas fa-shopping-cart"></i>
                              </button>
                        </td>

                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Cart Page End -->



    @endsection