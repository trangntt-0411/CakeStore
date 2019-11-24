<?php

namespace App\Providers;
use App\ProductType;
use App\Cart;
use Session;

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
        view()->composer(['header','master'],function($view){
            $p_type = ProductType::all();
            $view->with('p_type',$p_type);
        });
        view()->composer(['header'],function($view){
            if(Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart')]);
            }          
        });
    }
}
