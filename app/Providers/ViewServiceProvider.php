<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;


class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Facades\View::composer(['user.layouts.partials.header', 'user.dashboard', 'user.layouts.partials.cart', 'user.order', 'user.orderCompleted', 'user.cart'],
        function ($view) {
            if(Auth::guard('web')->check()){
                $user = Auth::guard('web')->user()->with(['wishlists','carts'])->withCount('carts','wishlists')->first();
                $view->with('user', $user);
            }
        });
    }
}
