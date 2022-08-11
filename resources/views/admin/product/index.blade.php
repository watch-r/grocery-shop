@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Product Section</h4>
        <hr>
        <a href="{{ url('product-add')}}" class="btn" style="color:white; background-color:crimson"><i
                class="material-icons">add</i> Add</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/products/'.$item->product_image)}}" class="image-category"
                            alt="Image">
                    </td>
                    <td>
                        <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection