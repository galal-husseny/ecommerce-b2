<?php
namespace App\Http\Controllers\User\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AbstractAuth\Auth\AuthenticatedSessionController as AbstractAuthenticatedSessionController ;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends AbstractAuthenticatedSessionController
{
    /**
     * guard
     *
     * @var string
    */
    private $guard = "web";

    /**
     * routeNamePrefix
     *
     * @var string
    */
    private $routeNamePrefix = "users.";

    /**
     * viewPrefix
     *
     * @var string
    */
    private $viewPrefix = "user.";

    /**
     * Get guard
     *
     * @return  string
    */
    public function getGuard() :string
    {
        return $this->guard;
    }

    /**
     * Set guard
     *
     * @param  string  $guard  guard
     *
     * @return  void
    */
    public function setGuard(string $guard) :void
    {
        $this->guard = $guard;
    }

    /**
     * Get routeNamePrefix
     *
     * @return  string
    */
    public function getRouteNamePrefix() :string
    {
        return $this->routeNamePrefix;
    }

    /**
     * Set routeNamePrefix
     *
     * @param  string  $routeNamePrefix  routeNamePrefix
     *
     * @return  void
    */
    public function setRouteNamePrefix(string $routeNamePrefix) :void
    {
        $this->routeNamePrefix = $routeNamePrefix;
    }

    /**
     * Get viewPrefix
     *
     * @return  string
    */
    public function getViewPrefix() :string
    {
        return $this->viewPrefix;
    }

    /**
     * Set viewPrefix
     *
     * @param  string  $viewPrefix  viewPrefix
     *
     * @return  void
    */
    public function setViewPrefix(string $viewPrefix) :void
    {
        $this->viewPrefix = $viewPrefix;
    }

    /**
     * Handle an out coming github authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }


    /**
     * Handle an incoming github authentication request.
     *
     * @return void
     */
    public function githubCallback()
    {
        $providerUser = Socialite::driver('github')->user();
        $user = User::where('email', $providerUser->email)->first();
        if (! $user) {
            $user = User::create([
                'name' => $providerUser->name ?? $providerUser->nickname,
                'email' => $providerUser->email,
                'avatar' => $providerUser->avatar,
                'token' => $providerUser->token,
                'provider_id' => $providerUser->id,
                'provider' => 'github',
                'email_verified_at' => now()
            ]);
        }
        Auth::guard($this->guard)->login($user);

        return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
    }


    /**
     * Handle an out coming google authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    /**
     * Handle an incoming google authentication request.
     *
     * @return void
     */
    public function googleCallback()
    {
        $providerUser = Socialite::driver('google')->user();
        $user = User::where('email', $providerUser->email)->first();
        if (! $user) {
            $user = User::create([
                'name' => $providerUser->name ?? $providerUser->nickname,
                'email' => $providerUser->email,
                'avatar' => $providerUser->avatar,
                'token' => $providerUser->token,
                'provider_id' => $providerUser->id,
                'provider' => 'google',
                'email_verified_at' => now()
            ]);
        }
        Auth::guard($this->guard)->login($user);

        return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
    }

    /**
     * Handle an out coming facebook authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Handle an incoming facebook authentication request.
     *
     * @return void
     */
    public function facebookCallback()
    {
        $providerUser = Socialite::driver('facebook')->user();
        dd($providerUser);
        $user = User::where('email', $providerUser->email)->first();
        if (! $user) {
            $user = User::create([
                'name' => $providerUser->name ?? $providerUser->nickname,
                'email' => $providerUser->email,
                'avatar' => $providerUser->avatar,
                'token' => $providerUser->token,
                'provider_id' => $providerUser->id,
                'provider' => 'facebook',
                'email_verified_at' => now()
            ]);
        }
        Auth::guard($this->guard)->login($user);

        return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
    }

}
