@extends('layouts.front')

@section('title')
    {{ $products->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections
                </a> /
                <a href="{{ url('category/' . $products->category->custom_url) }}">
                    {{ $products->category->name }}
                </a> /
                <a href="{{ url('category/' . $products->category->custom_url . '/' . $products->custom_url) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->product_image) }}" class="pro-image"
                            alt="Image of the Product">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            <label style="font-size:.8rem"
                                class="float-end badge bg-danger trending_tag">{{ $products->popular == '1' ? 'Popular' : '' }}</label>
                        </h2>
                        <hr>
                        <label class="me-3">Price: <s>Tk. {{ $products->original_price }}</s></label>
                        <label class="fw-bold">Tk. {{ $products->selling_price }}</label>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="product_id" />
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrease-btn">-</button>
                                    <input type="text" name="quantity " value="1"
                                        class="form-control qty-inp text-center " />
                                    <button class="input-group-text increase-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br />
                            <button type="button" class="btn btn-success me-3 float-lg-start">Add to Wishlist <i
                                    class="fa fa-heart"></i> </button>
                            <button type="button" class="btn addToCartBtn btn-primary me-3 float-lg-start">Add to Cart <i
                                    class="fa fa-shopping-cart"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="des-name col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="des-p mt-3">
                    {!! $products->description !!}
                </p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.addToCartBtn').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-inp').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function(response) {
                        swal(response.status);
                    }
                });
            });
            $('.increase-btn').click(function(e) {
                e.preventDefault();

                var value_inc = $('.qty-inp').val();
                var value = parseInt(value_inc, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $('.qty-inp').val(value);
                }
            });
            $('.decrease-btn').click(function(e) {
                e.preventDefault();

                var value_dec = $('.qty-inp').val();
                var value = parseInt(value_dec, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $('.qty-inp').val(value);
                }
            });
        });
    </script>
@endsection
