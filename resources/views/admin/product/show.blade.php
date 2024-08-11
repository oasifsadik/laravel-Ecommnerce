@extends('admin.master')
@section('admintitle')
Product Show
@endsection
@section('css')
    <style>
        .image-container {
    position: relative;
    display: inline-block;
    margin: 5px;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-container:hover .image-overlay {
    opacity: 1;
}

.edit-btn, .delete-btn {
    /* background-color: rgba(255, 255, 255, 0.8); */
    border: none;
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
}

.edit-btn:hover, .delete-btn:hover {
    /* background-color: white; */
}

    </style>
@endsection
@section('dashboardContent')
@include('admin.layout.slidebar')
@include('admin.layout.navbar')
@include('admin.layout.rightbar')
<div class="br-mainpanel">
    <div class="br-pagetitle d-flex justify-content-between align-items-center">
        <i class="icon ion-ios-folder-outline"></i>
        <div>
            <h4>Show Product</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="ml-auto">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper">
                <table id="" class="table display responsive nowrap">
                    <thead>
                        <tr class="table-hover">
                            <th class="">Category name</th>
                            <th class="">:</th>
                            <th class="">{{ $product->product_name }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th class="">Product Slug</th>
                            <th class="">:</th>
                            <th class="">{{ $product->product_slug }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th class="">Product Quantity</th>
                            <th class="">:</th>
                            @if (!empty($product->product_quantity))
                                <th>{{ $product->product_quantity }}</th>
                                @else
                                <th class="text-danger">Out Of Stock</th>
                            @endif
                        </tr>
                        @if ($product->color)
                            <tr class="table-hover">
                                <th class="">Product Color</th>
                                <th class="">:</th>
                                <th class="">{{ $product->color }}</th>
                            </tr>
                        @endif
                        @if ($product->size)
                        <tr class="table-hover">
                            <th class="">Product Size</th>
                            <th class="">:</th>
                            <th class="">{{ $product->size }}</th>
                        </tr>
                        @endif
                        <tr class="table-hover">
                            <th class="">Bying Price</th>
                            <th class="">:</th>
                            <th class="">{{ $product->buying_price }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th class="">Selling Price</th>
                            <th class="">:</th>
                            <th class="">{{ $product->selling_price }}</th>
                        </tr>
                        @if ($product->discount_type)
                        <tr class="table-hover">
                            <th class="">Discount type</th>
                            <th class="">:</th>
                            <th class="">{{ $product->discount_type }}</th>
                        </tr>
                        <tr class="table-hover">
                            <th class="">Discount Value</th>
                            <th class="">:</th>
                            <th class="">{{ $product->discount_value }} <sup class="badge badge-info">{{ $product->discount_type }}</sup> </th>
                        </tr>
                        <tr class="table-hover">
                            <th class="">Discount Price</th>
                            <th class="">:</th>
                            <th class="">{{ $product->discount_price }}</th>
                        </tr>
                        @endif
                        <tr class="table-hover">
                            <th class="">Image</th>
                            <th class="">:</th>
                            <th class="images">
                                @if ($product->images()->exists())
                                    @foreach ($product->images as $image)
                                        <div class="image-container" data-id="{{ $image->id }}">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" height="100px" alt="Product Image">
                                            <div class="image-overlay">
                                                <button class="edit-btn btn-outline-primary rounded" onclick="editImage({{ $image->id }})"><i class="fa fa-edit"></i></button>
                                                <form method="POST" action="" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-btn btn-outline-danger rounded"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No images found for this product.</p>
                                @endif
                            </th>
                        </tr>
                        @if ($product->description)
                        <tr class="table-hover">
                            <th class="">Discount type</th>
                            <th class="">:</th>
                            <th class="">{!! $product->description !!}</th>
                        </tr>
                        </tr>
                        @endif

                    </thead>
                </table>
            </div><!-- table-wrapper -->


        </div><!-- br-section-wrapper -->
    </div>
    @include('admin.layout.footer')
</div>

@endsection
