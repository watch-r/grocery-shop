<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $products = new Product();
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->product_image = $filename;
        }
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->small_description = $request->input('small_description');
        $products->custom_url = $request->input('custom_url');

        $products->original_price = $request->input('original_price');
        $products->tax = $request->input('tax');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');

        $products->status = $request->input('status') == True ? '1' : '0';
        $products->popular = $request->input('popular') == True ? '1' : '0';

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->save();
        return redirect('/products')->with('status', 'The Product is sucessfully added');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }
}