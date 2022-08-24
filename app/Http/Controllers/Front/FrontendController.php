<?php

namespace App\Http\Controllers\Front;

use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $feature_product = Product::where('popular', 1)->take(15)->get();
        $popular_category = Category::where('is_popular', 1)->take(15)->get();
        return view('frontend.index', compact('feature_product', 'popular_category'));
    }
    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }
    public function view_category($custom_url)
    {
        if (Category::where('custom_url', $custom_url)->exists()) {
            $category = Category::where('custom_url', $custom_url)->first();
            $products = Product::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', 'Link is Broken');
        }
    }
    public function view_product($category_custom_url, $product_custom_url)
    {
        if (Category::where('custom_url', $category_custom_url)->exists()) {
            if (Product::where('custom_url', $product_custom_url)->exists()) {
                $products = Product::where('custom_url', $product_custom_url)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $sum_rated = Rating::where('prod_id', $products->id)->sum('stars_rated');
                if ($ratings->count() > 0) {
                    $rating_value = $sum_rated / $ratings->count();
                } else {
                    $rating_value = 0;
                }
                return view('frontend.products.productview', compact('products', 'ratings', 'rating_value'));
            } else {
                return redirect('/')->with('status', 'No Such Product Found');
            }
        } else {
            return redirect('/')->with('status', 'Link is Broken');
        }
    }
}
