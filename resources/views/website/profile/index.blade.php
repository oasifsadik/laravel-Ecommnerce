@extends('website.master')
@section('fontCss')
<style>
    /* Sidebar Styling */
    .sidebar {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .list-group-item {
        border: none;
        padding: 10px 0;
    }

    .sidebar-link {
        display: block;
        font-size: 16px;
        color: #333;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    /* Hover effect */
    .sidebar-link:hover {
        background-color: #175CFF33;
        color: #175CFF;
        box-shadow: 0 2px 10px rgba(23, 92, 255, 0.2);
        border-left: 4px solid #175CFF;
    }

    /* Active state */
    .sidebar-link.active {
        background-color: #175CFF33;
        color: #175CFF;
        box-shadow: 0 2px 10px rgba(23, 92, 255, 0.2);
        border-left: 4px solid #175CFF;
    }

    .list-group-item:not(:last-child) {
        margin-bottom: 10px;
    }

    /* Profile Styling */
    .profile-container {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .profile-title {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }

    .profile-details {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .profile-item {
        flex: 1 1 48%;
        background-color: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-item h5 {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin-bottom: 8px;
    }

    .profile-item p {
        font-size: 14px;
        color: #555;
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

<!-- Begin Content Area with Sidebar -->
<div class="container mt-5 p-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar">
                <h3 class="sidebar-title">User Menu</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('user.profile',auth()->user()->id) }}" class="sidebar-link {{ Request::routeIs('user.profile', auth()->user()->id) ? 'active':'' }}">Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('user.order', auth()->user()->id) }}" class="sidebar-link {{ Request::routeIs('user.order', auth()->user()->id) ? 'active':'' }}">Orders</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('user.order.deliver', auth()->user()->id) }}" class="sidebar-link {{ Request::routeIs('user.order.deliver', auth()->user()->id) ? 'active':'' }}">Deliver Order</a>
                    </li>
                    {{-- <li class="list-group-item">
                        <a href="#" class="sidebar-link">Logout</a>
                    </li> --}}
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="profile-container">
                <h3 class="profile-title">User Profile</h3>
                <div class="profile-details">
                    <div class="profile-item">
                        <h5>First Name</h5>
                        <p>{{ auth()->user()->first_name }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Last Name</h5>
                        <p>{{ auth()->user()->last_name }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Email</h5>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Phone</h5>
                        <p>{{ auth()->user()->phone }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Company Name</h5>
                        <p>{{ auth()->user()->company_name ?? 'N/A' }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Address</h5>
                        <p>{{ auth()->user()->address }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Street Address</h5>
                        <p>{{ auth()->user()->street_address ?? 'N/A' }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>City</h5>
                        <p>{{ auth()->user()->city }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>State/County</h5>
                        <p>{{ auth()->user()->state_county }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Postcode</h5>
                        <p>{{ auth()->user()->postcode }}</p>
                    </div>
                    <div class="profile-item">
                        <h5>Country</h5>
                        <p>{{ auth()->user()->country }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Area End Here -->

<!-- Begin Footer Area -->
@include('website.layout.footer')
<!-- Footer Area End Here -->

<!-- Begin Quick View | Modal Area -->
<div class="modal fade modal-wrapper" id="exampleModalCenter" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                       <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <img src="images/product/large-size/1.jpg" alt="product image">
                                </div>
                                <!-- Additional Product Images -->
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>Today is a good day Framed poster</h2>
                                <span class="product-details-ref">Reference: demo_15</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">$57.98</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</span>
                                    </p>
                                </div>
                                <div class="single-add-to-cart">
                                    <form action="#" class="cart-quantity">
                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="#"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
