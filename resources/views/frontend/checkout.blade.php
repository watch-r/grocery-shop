@extends('layouts.front')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>
    <div class="conatiner mt-5 cont">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row form-checkout">
                                <div class="col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" class="form-control firstname" placeholder="Enter First Name">
                                    <span id="fname_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control lastname" placeholder="Enter Last Name">
                                    <span id="lname_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control email" placeholder="Enter Email">
                                    <span id="email_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Contact Number</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control phone" placeholder="Enter Contact Number">
                                    <span id="phone_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}" class="form-control address1" placeholder="Enter Address 1">
                                    <span id="address1_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}" class="form-control address2" placeholder="Enter Address 2">
                                    <span id="address2_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control city" placeholder="Enter City">
                                    <span id="city_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" name="country" class="form-control country" placeholder="Enter Country"
                                        value="{{ Auth::user()->country}}">
                                        <span id="country_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Zip Code</label>
                                    <input type="number" value="{{ Auth::user()->pincode }}" name="pincode" class="form-control pincode" placeholder="Enter Zip Code">
                                    <span id="pincode_error" class=" war-text" ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Detalis</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price (Tk.)</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart_items as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>{{ $item->products->selling_price * $item->product_qty }}</td>
                                        </tr>
                                        @php
                                            $total += $item->products->selling_price * $item->product_qty;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <h6>Total Price: <strong>Tk. {{ $total }}</strong></h6>
                            <button type="submit" class="btn btn-primary bg-success w-100">Place Order | COD</button>
                            <button type ='button'class="btn btn-primary w-100 mt-3 razorpay-btn">Pay With Razor Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection
