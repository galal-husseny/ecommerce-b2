<?php

namespace App\Providers;

use Illuminate\View\View;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        Facades\View::composer('user.layouts.partials.header', function (View $view) {
            if (Auth::guard('web')->check()) {
                $user = Auth::guard('web')->user()->with('carts')->withCount('carts')->first();
                $view->with('user', $user);
            }
        });
    }
}
