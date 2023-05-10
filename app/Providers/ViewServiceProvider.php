<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;


class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Facades\View::composer(['user.layouts.partials.header', 'user.dashboard', 'user.layouts.partials.cart', 'user.cart'],
        function ($view) {
            if(Auth::guard('web')->check()){
                $user = Auth::guard('web')->user()->withCount('carts','wishlists')->first();
                $userWithWishlists = $user->load('wishlists','carts');
                $view->with('user', $userWithWishlists);
            }
        });
    }
}
