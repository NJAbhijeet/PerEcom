@extends('frontend.layout.app')
@section('content')
<div class="top_breadcrumb">
    <div class="breadcrumb_container ">
        <div class="container">
            <nav data-depth="3" class="breadcrumb">
                <ol>
                    <li>
                        <a href="{{ route('index') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cart') }}">
                            <span> Cart </span>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="cart-page-area">
    <div class="container">
        <div class="table-content table-responsive mb-50">
            <table>
                <thead>
                    <tr>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-name">Product Name</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-remove">Remove</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($carts->isNotEmpty())
                        @foreach ($carts as $cart)
                            @php
                                $stock = $cart->product_price->stock ?? 0; // Assuming you have stock on product_price model
                                $line_total = $cart->product_price->selling_price * $cart->quantity;
                            @endphp
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="{{ route('slug', $cart->product->slug) }}">
                                        <img src="{{ asset('storage/product/' . basename($cart->product->single_image->images ?? 'default.jpg')) }}" alt="cart-image">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('slug', $cart->product->slug) }}">{{ $cart->product->name }}</a>
                                </td>
                                <td class="product-price">
                                    <span class="amount">Rs {{ number_format($cart->product_price->selling_price, 2) }}</span>
                                </td>
                                <td class="product-quantity">
                                    <div class="shop-cart-qty">
                                        <button class="minus-btn" onclick="decreaseCartQuantity({{ $cart->id }}, '{{ $cart->session_id ?? '' }}')">-</button>
                                        <input id="quantity_{{ $cart->id }}" class="quantity" type="number" min="1" max="{{ $stock }}" value="{{ $cart->quantity }}" onchange="updateSubtotal({{ $cart->id }})">
                                        <button class="plus-btn" onclick="increaseCartQuantity({{ $cart->id }}, '{{ $cart->session_id ?? '' }}')">+</button>
                                    </div>
                                    <span>Available Stock: {{ $stock }}</span>
                                </td>
                                <td class="product-subtotal" id="subtotal_{{ $cart->id }}">
                                    Rs {{ number_format($line_total, 2) }}
                                </td>
                                <td class="product-remove">
                                    <a href="{{ url('del/' . $cart->id . '/session_id/' . ($cart->session_id ?? '')) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No items found in your cart.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="buttons-cart">
                    {{-- Wrap in form if needed or add ajax handler --}}
                    <button type="button" onclick="updateCart()">Update Cart</button>
                    <a href="{{ route('index') }}">Continue Shopping</a>
                </div>
            </div>

            @if ($carts->isNotEmpty())
                <div class="col-md-4 col-sm-5">
                    <div class="cart_totals">
                        <h2>Cart Totals</h2>
                        <br>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="amount" id="cart-subtotal">Rs. {{ number_format($subtotal_cart, 2) }}/-</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="amount" id="cart-total">Rs. {{ number_format($subtotal_cart, 2) }}/-</span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function decreaseCartQuantity(cartId, sessionId = '') {
        // Implement AJAX to decrease quantity on backend, then update page accordingly
    }

    function increaseCartQuantity(cartId, sessionId = '') {
        // Implement AJAX to increase quantity on backend, then update page accordingly
    }

    function updateSubtotal(cartId) {
        // Implement AJAX or logic to update subtotal and totals after quantity change
    }

    function updateCart() {
        // Trigger an update for cart items, e.g. submitting a form or sending AJAX
        alert('Update cart functionality to be implemented.');
    }
</script>
@endsection
