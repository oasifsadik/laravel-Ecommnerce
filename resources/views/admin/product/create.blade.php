@extends('admin.master')
@section('admintitle')
    Create Products
@endsection
@section('css')
    <style>
        textarea {
            width: 100%;
        }
        .invalid-feedback {
            display: block;
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
                <h4>Product</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="form-layout form-layout-1">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row mg-b-25">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control custom-select mb-3" name="cat_id" id="cat_id">
                                        <option  selected disabled hidden>Select Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('cat_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">product slug: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_slug') is-invalid @enderror" type="text" id="product_slug" value="{{ old('product_slug') }}" name="product_slug" placeholder="Product Slug" readonly>
                                    @error('product_slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_name') is-invalid @enderror" type="text" value="{{ old('product_name') }}" id="product_name" name="product_name" placeholder="Enter Product Name">
                                    @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_quantity') is-invalid @enderror" value="{{ old('product_quantity') }}" type="number" name="product_quantity" placeholder="Enter Product Quantity">
                                    @error('product_quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Buying Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('buying_price') is-invalid @enderror" value="{{ old('buying_price') }}" type="number" name="buying_price" placeholder="Enter Buying price">
                                    @error('buying_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Sellinig Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price') }}" type="number" name="selling_price" placeholder="Enter Buying price">
                                    @error('selling_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Discount Type:</label>
                                    <select id="discount-type" class="form-control select2" name="discount_type" data-placeholder="Choose country">
                                        <option label="Select Discount Type"></option>
                                        <option value="TK" {{ old('discount_type') == 'TK' ? 'selected':'' }}>TK</option>
                                        <option value="Percentages" {{ old('discount_type') == 'Percentages' ? 'selected':'' }}>percentages</option>
                                    </select>
                                    @error('discount_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div id="discount-value-div" class="form-group" style="{{ old('discount_type') ? '' : 'display: none' }}">
                                        <label class="form-control-label">Discount Value: <span class="tx-danger">*</span></label>
                                        <input class="form-control @error('discount_value') is-invalid @enderror" type="number" name="discount_value" placeholder="Enter Discount Value" value="{{ old('discount_value') }}">
                                        @error('discount_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Color:</label>
                                      <input class="form-control @error('color') is-invalid @enderror" type="text" id="color" name="color" data-role="tagsinput" placeholder="red,green................">
                                      @error('color')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">Size:</label>
                                      <input class="form-control @error('size') is-invalid @enderror" type="text" id="size" name="size" data-role="tagsinput" placeholder="S,L,XL................">
                                      @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Images:</label>
                                        <input class="form-control @error('images') is-invalid @enderror" type="file" name="images[]" id="formFileMultiple" multiple accept="image/*">

                                        @error('images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Thumbnail:</label>
                                        <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail" id="formFileMultiple">

                                        @error('thumbnail')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Action:</label>
                                        <select id="action-type" class="form-control select2 @error('action') is-invalid @enderror" name="action" data-placeholder="Choose action type">
                                            <option label="Select Action Type"></option>
                                            <option value="Active" {{ old('action') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="In-Active" {{ old('action') == 'In-Active' ? 'selected' : '' }}>In-Active</option>
                                        </select>
                                        @error('action')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Description:</label>
                                        <textarea id="summernote" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            <div class="form-layout-footer col-md-8">
                                <button class="btn btn-info">Submit Form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.layout.footer')
        </div>
    </div>
@endsection

@section('js__')
<script>
    document.getElementById('product_name').addEventListener('input', function() {
        var nameValue = this.value;
        var slugValue = nameValue.toLowerCase().replace(/\s+/g, '-');
        document.getElementById('product_slug').value = slugValue;
    });

    document.getElementById('discount-type').addEventListener('change', function() {
        var discountValueDiv = document.getElementById('discount-value-div');
        if(this.value === 'TK' || this.value === 'Percentages'){
            discountValueDiv.style.display = 'block';
        }else{
            discountValueDiv.style.display = 'none';
        }
    });

    $(document).ready(function() {
        $('#color').tagsinput();
    });
    $(document).ready(function() {
        $('#size').tagsinput();
    });

    $('#summernote').summernote({
        height: 150,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen',] ]
        ],
        callbacks: {
                onInit: function() {
                    // Set the old value when the editor is initialized
                    $('#summernote').summernote('code', {!! json_encode(old('description')) !!});
                }
            }
        })


</script>
@endsection
