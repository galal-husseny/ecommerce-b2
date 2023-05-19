<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddressRedirection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $previousUrl = url()->previous();
        if (basename($previousUrl) === 'cart') {
            session()->put('redirect_url', route('cart'));
        }
        return $next($request);
    }
}
