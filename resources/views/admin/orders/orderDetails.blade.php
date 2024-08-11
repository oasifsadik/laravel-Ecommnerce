@extends('admin.master')

@section('admintitle')
    Order Details
@endsection

@section('dashboardContent')
    @include('admin.layout.slidebar')
    @include('admin.layout.navbar')
    @include('admin.layout.rightbar')

    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-photos-outline"></i>
            <div>
                <h4>Order Details</h4>
                <p class="mg-b-0">Detailed view of the order.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Order Information</h6>
                <p class="br-section-text">Details of the selected order.</p>

                <div class="bd bd-gray-300 rounded table-responsive">
                    <table class="table mg-b-0">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Thumbnail</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails->items as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>
                                        @if($item->product && $item->product->thumbnail)
                                            <img src="{{ asset('storage/' . $item->product->thumbnail) }}" height="80px" alt="{{ $item->product_name }}">
                                        @else
                                            <img src="{{ asset('images/no-image.png') }}" height="80px" alt="No Image">
                                        @endif
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                <td>${{ $orderDetails->total_price}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="mt-4">
                    <h6>Customer Details</h6>
                    <p>Name: {{ $orderDetails->first_name }} {{ $orderDetails->last_name }}</p>
                    <p>City: {{ $orderDetails->city }}</p>
                    <p>State: {{ $orderDetails->state_county }}</p>
                    <p>Post Code: {{ $orderDetails->postcode }}</p>
                    <p>Address: {{ $orderDetails->address }}</p>
                    <p>Street Address: {{ $orderDetails->street_address }}</p>
                    <p>Phone: {{ $orderDetails->phone }}</p>
                </div>

                <div class="mt-4">
                    <form action="{{ route('admin.order.confirm', $orderDetails->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>

        @include('admin.layout.footer')
    </div>
@endsection
