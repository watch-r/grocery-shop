<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $feature_product = Product::where('popular', 1)->take(15)->get();
        return view('frontend.index', compact('feature_product'));
    }
}