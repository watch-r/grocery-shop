<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $feature_product = Product::where('popular', 1)->take(15)->get();
        $popular_category = Category::where('is_popular',1)->take(15)->get();
        return view('frontend.index', compact('feature_product','popular_category'));
    }
    public function category()
    {
        $category = Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }
}