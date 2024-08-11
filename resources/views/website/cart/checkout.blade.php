@extends('website.master')
@section('fontCss')
<style>
    .payment-method {
        margin-top: 20px;
    }

    .card {
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .card-header {
        display: flex;
        align-items: center;
    }

    .panel-title {
        margin: 0;
        display: flex;
        align-items: center;
    }

    input[type="radio"] {
        display: none;
    }

    input[type="radio"]+label {
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        user-select: none;
    }

    input[type="radio"]+label::before {
        content: "";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        border: 2px solid #ebd50f;
        border-radius: 50%;
        background: #fff;
    }

    input[type="radio"]:checked+label::after {
        content: "";
        position: absolute;
        left: 6px;
        top: 50%;
        transform: translateY(-50%);
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #ebd50f;
    }

    .order-button-payment {
        margin-top: 20px;
        text-align: right;
    }

    .order-button-payment input[type="submit"] {
        background-color: #ebd50f;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 4px;
    }

    .order-button-payment input[type="submit"]:hover {
        background-color: #ebd50f;
    }
</style>
@endsection
@section('webContent')
<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    @include('website.layout.topHeader')
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    @include('website.layout.middleHeader')
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    @include('website.layout.menuBar')
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pt-60 pb-60">
    {{-- <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing-info-wrap">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Full Name</label>
                                            <input type="text" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Email Address</label>
                                            <input type="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Address</label>
                                            <input type="text" name="address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="billing-info mb-20">
                                            <label>City</label>
                                            <input type="text" name="city" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="billing-info mb-20">
                                            <label>Postcode / ZIP</label>
                                            <input type="text" name="postcode" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Country</label>
                                            <input type="text" name="country" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="your-order-area">
                                <h3>Your Order</h3>
                                <div class="your-order-wrap">
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cartProducts as $item)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $item->name }} <strong class="product-quantity"> × {{
                                                            $item->qty }}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">${{ number_format((float) $item->price *
                                                            (float) $item->qty, 2) }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount">{{Cart::subtotal() }}</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td><strong><span class="amount">{{Cart::total() }}</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="payment-method">
                                        <h3>Payment Method</h3>
                                        <div class="payment-method-list">
                                            <div class="payment-method-item">
                                                <input type="radio" id="bank" name="payment_method" value="bank"
                                                    checked>
                                                <label for="bank">Direct Bank Transfer</label>
                                            </div>
                                            <div class="payment-method-item">
                                                <input type="radio" id="cash" name="payment_method" value="cash">
                                                <label for="cash">Cash on Delivery</label>
                                            </div>
                                            <div class="payment-method-item">
                                                <input type="radio" id="paypal" name="payment_method" value="paypal">
                                                <label for="paypal">PayPal</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Place-order mt-25">
                                    <button type="submit" class="btn-hover">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                sit amet ipsum luctus.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row">
                                    <input value="Login" type="submit">
                                    <label>
                                        <input type="checkbox">
                                        Remember me
                                    </label>
                                </p>
                                <p class="lost-password"><a href="#">Lost your password?</a></p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                    <!--Accordion Start-->
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input placeholder="Coupon code" type="text">
                                    <input value="Apply Coupon" type="submit">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Country <span class="required">*</span></label>
                                    <select class="nice-select wide" name="country" required>
                                        <option data-display="Bangladesh">Bangladesh</option>
                                        <option value="uk">London</option>
                                        <option value="rou">Romania</option>
                                        <option value="fr">French</option>
                                        <option value="de">Germany</option>
                                        <option value="aus">Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input type="text" name="first_name" value="{{ $user->first_name }}" placeholder="Enter Your First Name....." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Enter Your Last Name......." required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" value="{{ $user->company_name }}" placeholder="Enter Your Company Name......">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" value="{{ $user->address }}" name="address" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" value="{{ $user->street_address }}" name="street_address" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" name="city" value="{{ $user->city }}" placeholder="Enter Your City Name....." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input placeholder="Enter Your State / County....." type="text" value="{{ $user->state_county }}" name="state_county" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input placeholder="Enter Your Postcode / Zip....." type="text" value="{{ $user->postcode }}" name="postcode" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="Enter Your Email......." type="email" value="{{ $user->email }}" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter Your Phone Number...." required>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartProducts as $item)
                                <tr class="cart_item">
                                    <td class="cart-product-name">{{ $item->name }}<strong class="product-quantity"> × {{ $item->qty }}</strong></td>
                                    <td class="cart-product-total"><span class="amount">{{ number_format($item->qty * $item->price, 2) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">{{ Cart::subtotal() }}</span></td>
                                </tr>
                                @php
                                $totalPrice = Cart::priceTotal();
                                @endphp
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">{{ $totalPrice}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="panel-title">
                                            <input type="radio" name="payment_method" value="online_payment" id="online_payment">
                                            <label for="online_payment">Online Payment</label>
                                        </h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="panel-title">
                                            <input type="radio" name="payment_method" value="cod" id="cod" checked="checked" >
                                            <label for="cod">Cash on Delivery</label>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div id="payment-instructions">
                                <p>Please select a payment method to see instructions.</p>
                            </div>
                            <div class="order-button-payment">
                                <input value="Place order" type="submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>




    </div>
</div>
<!-- Begin Footer Area -->
@include('website.layout.footer')
<!-- Footer Area End Here -->

@endsection
@section('font-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const onlinePaymentRadio = document.getElementById('online_payment');
        const codRadio = document.getElementById('cod');
        const paymentInstructions = document.getElementById('payment-instructions');
        const orderTotalElement = document.querySelector('.order-total .amount');
        const cartSubtotalElement = document.querySelector('.cart-subtotal .amount');
        const deliveryCharge = 100.00; // Example delivery charge

        // Get the initial subtotal from the cart
        let cartSubtotal = parseFloat(cartSubtotalElement.textContent.replace(/,/g, ''));

        function formatPrice(price) {
            return price.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function updatePaymentInstructions() {
            let orderTotal = cartSubtotal;

            if (onlinePaymentRadio.checked) {
                paymentInstructions.innerHTML = "<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>";
            } else if (codRadio.checked) {
                paymentInstructions.innerHTML = "<p>You have selected Cash on Delivery. Please have the exact amount ready at the time of delivery. A delivery charge of " + formatPrice(deliveryCharge) + " will be added to your order.</p>";
                orderTotal += deliveryCharge;
            }

            orderTotalElement.textContent = formatPrice(orderTotal);
        }

        onlinePaymentRadio.addEventListener('change', updatePaymentInstructions);
        codRadio.addEventListener('change', updatePaymentInstructions);

        // Initialize with the default selection
        if (onlinePaymentRadio.checked || codRadio.checked) {
            updatePaymentInstructions();
        }
    });
</script>



@endsection
