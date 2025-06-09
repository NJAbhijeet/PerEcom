@extends('frontend.layout.app')
@section('content')

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
}

.blog-container {
    max-width: 1000px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.blog-container h1 {
    color: #444;
    margin-bottom: 20px;
}

.blog-row {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap; /* Makes it responsive */
}

.blog-card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    flex: 1 1 calc(33.333% - 20px); /* Three cards in a row */
    box-sizing: border-box;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.blog-image {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

.blog-card h2 {
    color: #222;
    margin-bottom: 10px;
}

.date {
    font-size: 0.9em;
    color: #777;
    margin-bottom: 10px;
}

.content {
    font-size: 1em;
    line-height: 1.6;
    margin-bottom: 15px;
}

.read-more {
    display: inline-block;
    padding: 10px 15px;
    background-color: #007BFF;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.3s;
}

.read-more:hover {
    background-color: #0056b3;
}

/* Responsive Design */
@media (max-width: 768px) {
    .blog-card {
        flex: 1 1 calc(50% - 20px); /* Two cards in a row on tablets */
    }
}

@media (max-width: 480px) {
    .blog-card {
        flex: 1 1 100%; /* One card per row on small screens */
    }
}

</style>
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
                    <a href="{{route('privacy')}}" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="{{route('terms')}}" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
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
                            <a href="#" class="my-auto">
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
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Blog Page Start -->
        <div class="blog-container">
            <h1>My Blog</h1>
            <div class="blog-row">
                <div class="blog-card">
                    <img src="https://via.placeholder.com/350x200" alt="Post Title 1" class="blog-image">
                    <h2>Post Title 1</h2>
                    <p class="date">Published on April 1, 2025</p>
                    <p class="content">This is a brief overview of the first blog post. It highlights key points to intrigue readers.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>

                <div class="blog-card">
                    <img src="https://via.placeholder.com/350x200" alt="Post Title 2" class="blog-image">
                    <h2>Post Title 2</h2>
                    <p class="date">Published on March 28, 2025</p>
                    <p class="content">A summary of an engaging blog post that dives into interesting subjects with fresh perspectives.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>

                <div class="blog-card">
                    <img src="https://via.placeholder.com/350x200" alt="Post Title 3" class="blog-image">
                    <h2>Post Title 3</h2>
                    <p class="date">Published on March 20, 2025</p>
                    <p class="content">Explore the insights of this third blog post, offering unique views and takeaways.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Page End -->


    @endsection
