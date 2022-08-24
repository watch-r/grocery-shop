@extends('layouts.admin')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-h">
                        <h4>Order View
                            <a href="{{ url('orders') }}" class="btn btn-warning float-right">Back<a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 ord-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border ">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border ">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>
                                <label for="">Contact No.</label>
                                <div class="border ">{{ $orders->phone }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border ">
                                    {{ $orders->address1 }},<br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},
                                    {{ $orders->country }},
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qunatity</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>
                                                    <img class="w-50 align-content-center"
                                                        src="{{ asset('assets/uploads/products/' . $item->products->product_image) }}"
                                                        alt="Image Of the Product">
                                                </td>
                                                <td>{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2"> Total: <span class="float-right"><strong>Tk.
                                            {{ $orders->total }}</span> </strong></h4>
                                <div class="mt-3">
                                    <label for=""> Order Status </label>
                                    <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{ $orders->o_status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $orders->o_status == '1' ? 'selected' : '' }} value="1">
                                                Completed
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
