<?php
namespace App\Http\Controllers\AbstractAuth\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;

abstract class ProfileController extends Controller implements
GuardInterface,
RouteNamePrefixInterface,
ViewPrefixInterface
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view($this->getViewPrefix() . 'profile.edit', [
            'user' => $request->user($this->getGuard()),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user($this->getGuard())->fill($request->validated());

        if ($request->user($this->getGuard())->isDirty('email')) {
            $request->user($this->getGuard())->email_verified_at = null;
        }

        $request->user($this->getGuard())->save();

        if ($request->has('email')) {
            event(new Registered($request->user($this->getGuard())));
        }

        return Redirect::route($this->getRouteNamePrefix() . 'profile.edit')
        ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user($this->getGuard());

        Auth::guard($this->getGuard())->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('users.dashboard');
    }
}
