<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\TaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can manage Admin Routes
|
*/

/** Admin | Backend Auth Routes */
Route::get('/admin',[AdminLoginController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin',[AdminLoginController::class,'login'])->name('admin.submit.login');
Route::post('/admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');

/** Admin | Backend Crud Routes */
Route::group(['prefix' => 'admin','middleware' => ['auth','admin']], function() {
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    /** Brand */
    Route::resource('brand', BrandController::class);
    Route::get('/brand/{id}/destroy',[BrandController::class,'destroy'])->name('brand.destroy');

    /** Category */
    Route::resource('category', CategoryController::class);
    Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

    /** Product */
    Route::resource('product', ProductController::class);
    Route::get('/product/{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');

    /** Shipping */
    Route::resource('shipping', ShippingController::class);
    Route::get('/shipping/{id}/destroy',[ShippingController::class,'destroy'])->name('shipping.destroy');

    /** Coupon */
    Route::resource('coupon', CouponController::class);
    Route::get('/coupon/{id}/destroy',[CouponController::class,'destroy'])->name('coupon.destroy');

    /** Discount */
    Route::resource('discount', DiscountController::class);
    Route::get('/discount/{id}/destroy',[DiscountController::class,'destroy'])->name('discount.destroy');

    /** Tax */
    Route::resource('tax', TaxController::class);
    Route::get('/tax/{id}/destroy',[TaxController::class,'destroy'])->name('tax.destroy');


    /** review */
    Route::get('review', [ReviewController::class,'index'])->name('review.index');
    Route::get('/review/{id}/destroy',[ReviewController::class,'destroy'])->name('review.destroy');


});



/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can manage Frontend Routes
|
*/

Route::get('/', function () {
    return view('welcome');
});
/** Frontpage | Homepage */
Route::get('/home', [HomeController::class, 'index'])->name('home');
/** Shop Page */
Route::get('/shop/{cat?}/{sub?}', [ShopController::class, 'index'])->name('shop');

/** Product */
Route::get('/product/{slug}', [ShopController::class, 'productDetail'])->name('product.detail');
Route::get('/product/{id}/detail/ajax', [ShopController::class, 'productDetailAjax'])->name('product.detail.ajax');

/** Cart */
Route::get('/carts',[CartController::class,'show'])->name('carts');
Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/add-to-cart-single/{slug?}',[CartController::class,'singleAddToCart'])->name('single-add-to-cart');
Route::get('cart/{id}/destroy',[CartController::class,'destroy'])->name('cart.delete');
Route::post('cart/update',[CartController::class,'cartUpdate'])->name('cart.update');

