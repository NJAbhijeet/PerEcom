@extends('frontend.layout.app')

@section('content')
    @push('styles')
        <style>
            .cart-item img {
                width: 80px;
                height: 80px;
                object-fit: cover;
            }

            .cart-total {
                font-size: 1.2rem;
            }
        </style>
    @endpush
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

        /* About Us Section */
        .about {
            padding: 80px 20px;
            background-color: #ffffff;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 100px;
            /* To avoid overlap with navbar */
        }

        .about h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        .about-text {
            max-width: 800px;
            margin: 0 auto;
            text-align: left;
            padding: 0 20px;
        }

        .about-text h3 {
            font-size: 2rem;
            margin-top: 20px;
            color: #333;
        }

        .about-text p {
            font-size: 1.125rem;
            margin-top: 20px;
            color: #666;
            line-height: 1.8;
            text-align: justify;
        }

        .about-text .cta-btn {
            margin-top: 30px;
            padding: 12px 24px;
            font-size: 1.125rem;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .about-text .cta-btn:hover {
            background-color: #218838;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            font-size: 0.9rem;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .about-text h3 {
                font-size: 1.75rem;
            }

            .about-text p {
                font-size: 1rem;
            }

            .about-text .cta-btn {
                width: 100%;
                padding: 12px 0;
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
                        <a href="{{ route('login') }}" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container my-5">
        <h2 class="mb-4">🛒 Your Cart</h2>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price (₹)</th>
                        <th>Quantity</th>
                        <th>Subtotal (₹)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($carts as $cart)
                        @php
                            $subtotal = $cart->product->sp * $cart->quantity;
                            $total += $subtotal;
                        @endphp
                        <tr class="cart-item">
                            <td>
                                <img src="{{ asset('storage/product/' . $cart->product->single_image->images) }}"
                                    alt="Product">
                            </td>
                            <td>{{ $cart->product->product_name }}</td>
                            <td class="price" data-price="{{ $cart->product->sp }}">₹{{ $cart->product->sp }}</td>
                            <td>
                                <input type="number" value="{{ $cart->quantity }}" min="1"
                                    class="form-control quantity w-50">
                            </td>
                            <td class="subtotal">₹{{ number_format($subtotal, 2) }}</td>
                            <td>
                                <a href="{{ url('del/') }}/{{ $cart->id }}/session_id/{{ $cart->session_id }}"
                                    class="remove-item btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('shop') }}" class="btn btn-secondary">← Continue Shopping</a>
            <div class="cart-total">
                <strong>Total: ₹<span id="cartTotal">{{ number_format($total, 2) }}</span></strong>
                <a href="{{ route('checkout') }}" class="btn btn-primary ms-3">Proceed to Checkout</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('.cart-item').forEach(function(row) {
                const subtotalText = row.querySelector('.subtotal').textContent.replace('₹', '') || 0;
                total += parseFloat(subtotalText);
            });
            document.getElementById('cartTotal').textContent = total.toFixed(2);
        }

        document.querySelectorAll('.quantity').forEach(function(input) {
            input.addEventListener('input', function() {
                const row = this.closest('.cart-item');
                const price = parseFloat(row.querySelector('.price').dataset.price);
                const quantity = parseInt(this.value) || 1;
                const subtotal = price * quantity;
                row.querySelector('.subtotal').textContent = '₹' + subtotal.toFixed(2);
                updateCartTotal();
            });
        });

        // Optional: If you want to remove row without page reload
        document.querySelectorAll('.remove-item').forEach(function(button) {
            button.addEventListener('click', function(e) {
                // e.preventDefault(); // Uncomment this if you intend to do AJAX delete later
                const row = this.closest('.cart-item');
                row.remove();
                updateCartTotal();
            });
        });
    </script>
@endpush
