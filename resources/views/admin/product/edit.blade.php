@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit or Update Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name='category_id' aria-label="Default select example">
                        <option value="">Select a Category</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{ $product->name }}" class=" form-control" name="name">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" value=""
                        class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" rows="3"
                        class="form-control">{{ $product->small_description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Custom URL</label>
                    <input type="text" class="form-control" value="{{ $product->custom_url }}" name="custom_url">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" class="form-control" value="{{ $product->original_price }}"
                        name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control" value="{{ $product->tax }}" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" class="form-control" value="{{ $product->selling_price }}"
                        name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" value="{{ $product->qty }}" name="qty">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $product->status == 1 ? 'checked':'' }} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $product->popular == 1 ? 'checked':'' }} name="popular">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{ $product->meta_title }}" class="form-control" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"
                        class="form-control">{{ $product->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                        class="form-control">{{ $product->meta_description }}</textarea>
                </div>

                <div class="col-md-12">
                    <input type="file" name="product_image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection