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
                    <a href="{{ route('privacy') }}" class="text-white"><small class="text-white mx-2">Privacy
                            Policy</small>/</a>
                    <a href="{{ route('terms') }}" class="text-white"><small class="text-white mx-2">Terms of
                            Use</small>/</a>
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
                        <a href="{{ route('shop') }}" class="nav-item nav-link active">Shop</a>

                        <a href="{{ route('testimonials') }}" class="nav-item nav-link">Testimonial</a>

                        <a href="{{ route('contacts') }} " class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i></button>
                        <a href="{{ route('cart') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                        </a>
                        <a href="{{ route('wishlist') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-heart fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                        </a>
                        <a href="{{ route('login') }}" class="my-auto">
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
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">

                                    @php
                                        $categories = App\Models\Category::where('status', 'active')
                                            ->take('2')
                                            ->inRandomOrder()
                                            ->get();
                                    @endphp
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach ($categories as $cat)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{ route('product-by-category', $cat->slug) }}"><i
                                                                class="fas fa-apple-alt me-2"></i>{{ $cat->name }}</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                            min="0" max="500" value="0"
                                            oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500"
                                            for="rangeInput">0</output>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 class="mb-3">Featured products</h4>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="{{ asset('frontend/img/featur-1.jpg') }}" class="img-fluid rounded"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 ₹</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 ₹</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="{{ asset('frontend/img/featur-2.jpg') }}" class="img-fluid rounded"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 ₹</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 ₹</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="{{ asset('frontend/img/featur-3.jpg') }}" class="img-fluid rounded"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 ₹</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 ₹</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center my-4">
                                        <a href="#"
                                            class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                            More</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">

                                @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="{{ route('shopdetail', $product->slug) }}">
                                                    <img style="width:306px; height:191px"
                                                        src="{{ asset('storage/product/' . $product->single_image->images) }}"
                                                        class="img-fluid w-100 rounded-top" alt="Grapes">
                                                </a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">{{ $product->category->name }}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="">
                                                    <h4>{{ $product->product_name }}</h4>
                                                </a>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">₹{{ $product->sp }} /
                                                        {{ $product->units->name }}</p>
                                                    <a href="javascript:void(0);"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"
                                                        onclick="addToCart({{ $product->id }})">
                                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        {{ $products->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

    <script>
        function addToCart(productId) {
            $.ajax({
                url: "{{ route('add-to-cart') }}",
                method: "POST",
                data: {
                    product_id: productId,
                    pno: 1,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        alert('Product added to cart!');
                        // optionally update cart count or UI here
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    </script>
@endsection
