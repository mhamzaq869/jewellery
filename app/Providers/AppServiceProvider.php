<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         View::composer('*', function ($view) {
           $view->with('menu_categories', DB::table('categories')->whereNull('parent_id')->where('status',1)->get());
           $view->with('brands', DB::table('brands')->where('status',1)->get());
           $view->with('carts', Cart::with('product')->where('user_id',request()->ip())->get());
        });
    }
}
