@extends('layouts.front')
@section('title')
    Welcome to BXD Grocery Shop
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="feature-carousel owl-carousel owl-theme">
                    @foreach ($feature_product as $item)
                        <div class="item">
                            <a href="{{ url('category/' . $item->category->custom_url . '/' . $item->custom_url) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $item->product_image) }}"
                                        alt="Image of the Product">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <span class="float-start">{{ $item->selling_price }}</span>
                                        <span class="float-end"><s>{{ $item->original_price }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Popular Categories</h2>
                <div class="feature-carousel owl-carousel owl-theme">
                    @foreach ($popular_category as $item)
                        <div class="item">
                            <a href="{{ url('category/' . $item->custom_url) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/' . $item->image) }}"
                                        alt="Image of the Category">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var owl = $('.feature-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true
        });
        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })
    </script>
@endsection
