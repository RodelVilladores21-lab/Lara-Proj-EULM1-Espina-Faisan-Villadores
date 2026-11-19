
@extends('layouts.app')

@section('title', 'Order Coffee | ShizuKafe.brew')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush

@section('content')

@php
$products = [
    [
        'name' => 'Americano',
        'price' => 49,
        'image' => asset('images/products/americano.png'),
    ],
    [
        'name' => 'Black Coffee',
        'price' => 89,
        'image' => asset('images/products/black-coffee.png'),
    ],
    [
        'name' => 'Mocha',
        'price' => 99,
        'image' => asset('images/products/mocha.png'),
    ],
    [
        'name' => 'Breve',
        'price' => 89,
        'image' => asset('images/products/breve.png'),
    ],
    [
        'name' => 'Iced Caramel Macchiato',
        'price' => 89,
        'image' => asset('images/products/iced-caramel-macchiato.png'),
    ],
    [
        'name' => 'Don Matchatos',
        'price' => 99,
        'image' => asset('images/products/don-matchatos.png'),
    ],
    [
        'name' => 'Donya Berry',
        'price' => 109,
        'image' => asset('images/products/donya-berry.png'),
    ],
    [
        'name' => 'Don Darko',
        'price' => 99,
        'image' => asset('images/products/don-darko.png'),
    ],
    [
        'name' => 'Matcha Berry',
        'price' => 129,
        'image' => asset('images/products/matcha-berry.png'),
    ],
    [
        'name' => 'Black Forest',
        'price' => 109,
        'image' => asset('images/products/black-forest.png'),
    ],
];
@endphp

<section class="order-page">

    <div class="order-heading">
        <p class="order-subtitle">FRESHLY BREWED FOR YOU</p>
        <h1>Order Your <span>Favorite Coffee</span></h1>
        <p>Select your favorite drinks and customize your order.</p>
    </div>

    <div class="order-layout">

        <div class="order-products">

            <h2>Available Drinks</h2>

            <div class="order-product-grid">

                @foreach($products as $product)

                <div class="order-card"
                    data-name="{{ $product['name'] }}"
                    data-price="{{ $product['price'] }}">

                    <img src="{{ $product['image'] }}"
                         alt="{{ $product['name'] }}">

                    <div class="order-card-info">

                        <h3>{{ $product['name'] }}</h3>

                        <p class="order-price">
                            ₱{{ number_format($product['price'], 2) }}
                        </p>

                        <button class="select-product-btn">
                            Select Drink +
                        </button>

                        <div class="quantity-controls" hidden>

                            <button class="quantity-minus">−</button>

                            <span class="quantity-value">1</span>

                            <button class="quantity-plus">+</button>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>


        <!-- ORDER SUMMARY -->

        <aside class="order-summary">

            <h2>Your Order</h2>

            <p class="summary-description">
                Your selected drinks will appear here.
            </p>

            <div id="selectedOrders">

                <p class="empty-order">
                    No drinks selected yet.
                </p>

            </div>

            <div class="summary-total">

                <span>Total Amount</span>

                <strong id="totalAmount">₱0.00</strong>

            </div>

            <button id="doneOrder" class="done-order-btn" disabled>
                Done – Confirm Order
            </button>

            <button id="clearOrder" class="clear-order-btn">
                Clear Selection
            </button>

        </aside>

    </div>


    <!-- SUCCESS MESSAGE -->

    <div class="success-overlay" id="successOverlay" hidden>

        <div class="success-box">

            <div class="success-icon">✓</div>

            <h2>Order Successful!</h2>

            <p>Your order has been successfully prepared in this demo.</p>

            <div id="successOrderDetails"></div>

            <h3 id="successTotal">Total: ₱0.00</h3>

            <button id="closeSuccess">
                Continue
            </button>

        </div>

    </div>

</section>

@endsection

@push('scripts')
<script src="{{ asset('js/order.js') }}"></script>
@endpush
