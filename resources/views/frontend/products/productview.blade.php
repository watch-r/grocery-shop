@extends('layouts.front')

@section('title')
    {{ $products->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{ $products->category->name }} / {{ $products->name }}</h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow">
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
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text">-</span>
                                    <input type="text" name="quantity" value="1" class="form-control" />
                                    <span class="input-group-text">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br />
                            <button type="button" class="btn btn-success me-3 float-lg-start">Add to Wishlist <i class="fa fa-heart"></i> </button>
                            <button type="button" class="btn btn-primary me-3 float-lg-start">Add to Cart <i class="fa fa-shopping-cart"></i> </button>
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
