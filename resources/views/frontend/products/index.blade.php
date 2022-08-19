@extends('layouts.front')
@section('title')
Products of {{ $category->name }}
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category->name }}</h2>
            @foreach($products as $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('assets/uploads/products/'.$item->product_image) }}" alt="Image of the Product">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <span class="float-start">{{ $item->selling_price }}</span>
                        <span class="float-end"><s>{{ $item->original_price }}</s></span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection