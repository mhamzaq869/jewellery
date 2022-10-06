<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
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
Route::get('/admin',[AdminLoginController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin',[AdminLoginController::class,'login'])->name('admin.submit.login');
Route::post('/admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');

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
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
