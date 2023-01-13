<?php
namespace App\Http\Controllers\AbstractAuth\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;


abstract class AuthenticatedSessionController extends Controller implements
GuardInterface,
RouteNamePrefixInterface,
ViewPrefixInterface
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view($this->getViewPrefix() . 'auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate($this->getGuard());

        $request->session()->regenerate();

        return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard($this->getGuard())->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route($this->getRouteNamePrefix() . 'login');
    }
}
