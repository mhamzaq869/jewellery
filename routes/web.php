<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\IntegrationController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\TaxController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WaitlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\PaymentMethodController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('artisan/{type}/{id}',function($type1,$type2){
    Artisan::all($type1.':'.$type2);
    return "Your command 'php artisan ".$type1.':'.$type2."' run successfully";
});

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
    Route::get('/global_search', [DashboardController::class,'globalSearch'])->name('admin.global.search');

    /** User */
    Route::resource('user', UserController::class);
    Route::get('/user/{id}/destroy',[UserController::class,'destroy'])->name('user.destroy');

    /** Brand */
    Route::resource('brand', BrandController::class);
    Route::get('/brand/{id}/destroy',[BrandController::class,'destroy'])->name('brand.destroy');

    /** Category */
    Route::resource('category', CategoryController::class);
    Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

    /** Product */
    Route::resource('product', ProductController::class);
    Route::get('/product/{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');

    /** Product */
    Route::get('/waitlist/{id}',[WaitlistController::class,'index'])->name('waitlist.index');

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
    Route::post('review/store', [ReviewController::class,'store'])->name('review.store');
    Route::get('/review/{id}/destroy',[ReviewController::class,'destroy'])->name('review.destroy');

    /** Order && Invoice*/
    Route::resource('order', OrderController::class);
    Route::get('order/{id}/invoice',[OrderController::class,'invoice'])->name('order.invoice');
    Route::get('invoice/{id}/download',[OrderController::class,'invoiceDownload'])->name('order.invoice.download');
    Route::get('invoice/{id}/print',[OrderController::class,'invoicePrint'])->name('order.invoice.print');

    /** Transaction */
    Route::get('transaction',[TransactionController::class,'index'])->name('transaction.index');

    /** Setting -> Profile */
    Route::get('profile',[SettingController::class,'profile'])->name('admin.profile');
    Route::post('profile/update',[SettingController::class,'profileUpdate'])->name('admin.profile.update');
    /** Setting -> General */
    Route::get('setting',[SettingController::class,'setting'])->name('admin.setting');
    Route::post('setting/update',[SettingController::class,'settingUpdate'])->name('admin.setting.update');
    /** Setting ->HomePage Banner */
    Route::get('banner',[SettingController::class,'banner'])->name('admin.banner');
    Route::get('banner/{id}',[SettingController::class,'bannerShow'])->name('admin.banner.show');
    Route::get('shop/banner',[SettingController::class,'shopBanner'])->name('admin.shop.banner');
    Route::post('banner/update',[SettingController::class,'bannerUpdate'])->name('admin.banner.update');

    /** Setting -> Integrations */
    Route::resource('integration', IntegrationController::class);
    Route::post('/integration/{id}/update',[IntegrationController::class,'update']);
    Route::get('/integration/{id}/destroy',[IntegrationController::class,'destroy'])->name('integration.destroy');



    /** Notifications */
    Route::get('/notifications',[NotificationController::class,'index'])->name('notification.index');
    Route::get('/showNotifications',[NotificationController::class,'show'])->name('show.all.notification');
    Route::get('/read/notification/{id}',[NotificationController::class,'read'])->name('read.notification');
    Route::get('/read/all/notifications',[NotificationController::class,'markAllRead'])->name('read.all.notification');

});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can manage user routes
|
*/

/** User Crud Routes */
Route::group(['prefix' => 'user','middleware' => ['auth','user']], function() {
    /** Order */
    Route::get('orders',[UserOrderController::class,'index'])->name('user.orders.index');
    Route::get('order/{id}',[UserOrderController::class,'show'])->name('user.orders.show');
    Route::get('order-completed',[UserOrderController::class,'orderCompleted'])->name('user.order.completed');
    /** Wishlist */
    Route::resource('wishlist',WishlistController::class);

    /** Profile */
    Route::resource('profile', UserProfileController::class);

    /** Address */
    Route::resource('address',AddressController::class);

    /** Payment Methods */
    Route::resource('payment',PaymentMethodController::class);

    /** Make|Place Order */
    Route::post('place/order',[CartController::class,'order'])->name('place.order');
    Route::get('paid/success/{type?}',[CartController::class,'paymentSuccess'])->name('payment.success');
    Route::get('paid/error/{type?}',[CartController::class,'paymentError'])->name('payment.error');

});


/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can manage Frontend Routes
|
*/

Auth::routes();

/** Frontpage | Homepage */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/message',[HomeController::class, 'contactMail'])->name('contact.store');
Route::post('/waitlist',[HomeController::class, 'waitlist'])->name('waitlist');
Route::post('/subscribe',[HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/shipping-returns', [HomeController::class, 'shippingReturns'])->name('shipping.returns');
Route::get('/store-locator', [HomeController::class, 'storeLocator'])->name('store.locator');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-condition', [HomeController::class, 'termsCondition'])->name('terms.condition');

/** Shop Page */
Route::get('/shop/{cat?}/{sub?}', [ShopController::class, 'index'])->name('shop');
Route::get('/filter-product-for',[ShopController::class, 'filter_product_for'])->name('filter.product');

/** Product */
Route::get('/product/{slug}', [ShopController::class, 'productDetail'])->name('product.detail');
Route::get('/product/{id}/detail/ajax', [ShopController::class, 'productDetailAjax'])->name('product.detail.ajax');
Route::post('/product/review', [ShopController::class, 'productReview'])->name('product.review');
Route::post('/product/search', [ShopController::class, 'productSearch'])->name('product.search');

/** Cart */
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::get('/carts',[CartController::class,'show'])->name('carts');
Route::post('/addToCart',[CartController::class,'addToCart'])->name('add.to.cart');
Route::get('/add-to-cart-single/{slug?}',[CartController::class,'singleAddToCart'])->name('single-add-to-cart');
Route::post('cart/update',[CartController::class,'cartUpdate'])->name('cart.update');
Route::get('cart/{id}/destroy',[CartController::class,'destroy'])->name('cart.delete');

/** Apply Coupon */
Route::post('apply/coupon',[CartController::class,'applyCoupon'])->name('apply.coupon');
Route::get('remove/coupon',[CartController::class,'removeCoupon'])->name('remove.coupon');


/** Checkout */
Route::get('/checkout',[CartController::class,'checkout'])->middleware(['auth','user'])->name('checkout');
