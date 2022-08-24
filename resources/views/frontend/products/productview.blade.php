@extends('layouts.front')

@section('title')
    {{ $products->name }}
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                        @php
                            $ratenum=number_format($rating_value);
                        @endphp
                        <div class="rating">
                            @for ($i=1;$i<=$ratenum;$i++)
                            <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $ratenum+1; $j<= 5;$j++)
                            <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($ratings->count()<=0)
                                    No Ratings yet
                                @else
                                {{ $ratings->count()}} Ratings
                                @endif

                            </span>
                        </div>
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
                            @if ($products->qty > 0)
                                <button type="button" class="btn addToCartBtn btn-primary me-3 float-lg-start">Add to Cart
                                    <i class="fa fa-shopping-cart"></i> </button>
                            @endif
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Rate this Product
                </button>
                <a href='{{ url('add-review/'.$products->custom_url.'/userreview') }}' class="btn btn-link">
                    Write A review
                </a>

            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')

@endsection --}}
