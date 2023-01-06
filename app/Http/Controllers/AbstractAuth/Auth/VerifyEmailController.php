<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

abstract class VerifyEmailController extends Controller implements
GuardInterface,
RouteNamePrefixInterface
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        $route = route($this->getRouteNamePrefix() . 'dashboard') . '?verified=1'; # url . ?verified=1

        if ($request->user($this->getGuard())->hasVerifiedEmail()) {
            return redirect($route);
        }

        if ($request->user($this->getGuard())->markEmailAsVerified()) {
            event(new Verified($request->user($this->getGuard())));
        }

        return redirect($route);
    }
}
