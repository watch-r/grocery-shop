<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\RatingController;
use App\Http\Controllers\Front\ReviewController;
// use App\Http\Controllers\Front\StripeController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\OrderController;
use App\Models\Review;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index']);
// Route::get('index', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('category/{custom_url}', [FrontendController::class, 'view_category']);
Route::get('category/{category_custom_url}/{product_custom_url}', [FrontendController::class, 'view_product']);
Route::get('product-list',[FrontendController::class,'list']);
Route::post('searchproduct',[FrontendController::class,'search']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', [CartController::class, 'add']);
Route::post('delete-cart-item', [CartController::class, 'delete']);
Route::post('update-cart', [CartController::class, 'update']);

Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'place_order']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::post('procced-to-pay',[CheckoutController::class,'razorpaycheck']);

    Route::post('add-rating',[RatingController::class, 'add']);

    Route::get('add-review/{product_url}/userreview',[ReviewController::class, 'add']);
    Route::get('edit-review/{product_url}/userreview',[ReviewController::class, 'edit']);
    Route::post('add-review',[ReviewController::class,'create']);
    Route::put('update-review', [ReviewController::class,'update'] );

    // Route::get('cardpay',[StripeController::class, 'call']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index');

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'del']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('product-add', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'del']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/view-order/{id}', [OrderController::class, 'viewOrder']);
    Route::put('update-order/{id}', [OrderController::class, 'update']);
    Route::get('order-history', [OrderController::class, 'ordHistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('users/view-user/{id}', [DashboardController::class, 'users_view']);

});
