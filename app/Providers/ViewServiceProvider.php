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
        Facades\View::composer(['user.layouts.partials.header'],
        function ($view) {
            if(Auth::guard('web')->check()){
                $view->with('user', Auth::guard('web')->user()->withCount('carts','wishlists')->first());
            }
        });
    }
}
