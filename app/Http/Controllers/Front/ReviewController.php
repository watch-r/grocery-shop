<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_url)
    {
        $product = Product::where('custom_url', $product_url)->where('status', '0')->first();
        if ($product) {
            $product_id = $product->id;
            $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.product_id', $product_id)->get();
            return view('frontend.reviews.index',compact('product','verified_purchase'));
        } else {
            return redirect()->back()->with('status', "Link Doesn't Exist");
        }

    }
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product =Product::where('id','product_id')->where('status','0')->first();
        if ($product) {
            # code...
        } else {
            return redirect()->back()->with('status','The Link is Broken');
        }

    }

}
