@extends('website.master')
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
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            {{-- <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="#" >
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address">

                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> --}}
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                    <input type="text" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Enter Your First Name....." >
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" class="@error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" name="last_name" placeholder="Enter Your Last Name......." >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Company Name</label>
                                    <input type="text" class="@error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" name="company_name" placeholder="Enter Your Company Name......">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" class="@error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" type="text" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <input class="@error('street_address') is-invalid @enderror" placeholder="Apartment, suite, unit etc. (optional)" value="{{ old('street_address') }}" name="street_address" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" class="@error('city') is-invalid @enderror" value="{{ old('city') }}" name="city" placeholder="Enter Your City Name....." >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input class="@error('state_county') is-invalid @enderror" placeholder="Enter Your State / County....." type="text" value="{{ old('state_county') }}" name="state_county" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input class="@error('postcode') is-invalid @enderror" placeholder="Enter Your Postcode / Zip....." type="text" value="{{ old('postcode') }}" name="postcode" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input class="@error('email') is-invalid @enderror" placeholder="Enter Your Email......." type="email" value="{{ old('email') }}" name="email" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input class="@error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter Your Phone Number...." >
                                </div>
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                {{-- <input  class="mb-0" type="password" placeholder="Password"> --}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" value="{{ old('password_confirmation') }}" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="register-button mt-0">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Begin Footer Area -->
@include('website.layout.footer')
@endsection
