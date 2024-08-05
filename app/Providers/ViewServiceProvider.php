<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('user.layouts.header', function ($view) {
            $cart = Cart::with([
                'cart_details:id,cart_id,product_id,quantity',
                'cart_details.product:id,name,price,description,category_id',
                'cart_details.product.category:id,name',
                'cart_details.product.images:image_id,image_url,image_type'
            ])->first();

            $view->with('cart', $cart);
        });
    }
}
