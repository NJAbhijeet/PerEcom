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

        /* FAQ Section */
        .faq {
            padding: 80px 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 100px;
        }

        .faq h2 {
            font-size: 2.8rem;
            margin-bottom: 40px;
            text-align: center;
            color: #333;
        }

        .faq-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            transition: background-color 0.3s ease;
        }

        .faq-item:hover {
            background-color: #f1f1f1;
        }

        .faq-item h4 {
            font-size: 1.6rem;
            margin-bottom: 15px;
            color: #333;
        }

        .faq-item p {
            font-size: 1.125rem;
            color: #666;
            line-height: 1.6;
        }

        .faq-item button {
            background-color: transparent;
            border: none;
            font-size: 1.125rem;
            color: #007bff;
            cursor: pointer;
            text-align: left;
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .faq-item button:hover {
            background-color: #f1f1f1;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .faq h2 {
                font-size: 2.2rem;
            }

            .faq-item h4 {
                font-size: 1.4rem;
            }

            .faq-item p {
                font-size: 1rem;
            }
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
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{route('index')}}" class="navbar-brand">
                <h1 class="text-primary display-6">Fruitables</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('shop')}}" class="nav-item nav-link">Shop</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{route('cart')}}" class="dropdown-item">Cart</a>
                            <a href="{{route('checkout')}}" class="dropdown-item">Chackout</a>
                            <a href="{{route('testimonials')}}" class="dropdown-item">Testimonial</a>
                           
                        </div>
                    </div>
                    <a href="{{route('contacts')}} " class="nav-item nav-link">Contact</a>
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

    <section class="faq">
        <h2>Frequently Asked Questions</h2>

        <div class="faq-item">
            <h4 onclick="toggleAnswer(1)">What is Fruitables?</h4>
            <p>Fruitables is a leading provider of fresh, organic, and healthy fruits delivered right to your doorstep. We aim to make healthy eating convenient and accessible for everyone.</p>
        </div>

        <div class="faq-item">
            <h4 onclick="toggleAnswer(1)">What is Fruitables?</h4>
            <p>Fruitables is a leading provider of fresh, organic, and healthy fruits delivered right to your doorstep. We aim to make healthy eating convenient and accessible for everyone.</p>
        </div>
        <div class="faq-item">
            <h4 onclick="toggleAnswer(1)">What is Fruitables?</h4>
            <p>Fruitables is a leading provider of fresh, organic, and healthy fruits delivered right to your doorstep. We aim to make healthy eating convenient and accessible for everyone.</p>
        </div>
        <div class="faq-item">
            <h4 onclick="toggleAnswer(1)">What is Fruitables?</h4>
            <p>Fruitables is a leading provider of fresh, organic, and healthy fruits delivered right to your doorstep. We aim to make healthy eating convenient and accessible for everyone.</p>
        </div>
        <div class="faq-item">
            <h4 onclick="toggleAnswer(1)">What is Fruitables?</h4>
            <p>Fruitables is a leading provider of fresh, organic, and healthy fruits delivered right to your doorstep. We aim to make healthy eating convenient and accessible for everyone.</p>
        </div>
        

 
    </section>

    <script>
        function toggleAnswer(id) {
            const answer = document.getElementById('answer-' + id);
            // Toggle the display style between 'none' and 'block'
            if (answer.style.display === 'none') {
                answer.style.display = 'block';
            } else {
                answer.style.display = 'none';
            }
        }
    </script>

@endsection
