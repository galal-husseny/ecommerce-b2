<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\AbstractAuth\Auth\RegisteredUserController as AbstractRegisteredUserController;

class RegisteredUserController extends AbstractRegisteredUserController
{
    /**
     * guard
     *
     * @var string
    */
    private $guard = "seller";

    /**
     * routeNamePrefix
     *
     * @var string
    */
    private $routeNamePrefix = "sellers.";

    /**
     * viewPrefix
     *
     * @var string
    */
    private $viewPrefix = "seller.";

    /**
     * model
     *
     * @var string
    */
    private $model = Seller::class;

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
     * Get model
     *
     * @return  string
     */
    public function getModel() :string
    {
        return $this->model;
    }

    /**
     * Set model
     *
     * @param  string  $model  model
     *
     * @return  void
     */
    public function setModel(string $model) :void
    {
        $this->model = $model;
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'. $this->getModel()],
            'phone' => ['required', 'regex://', 'unique:'.$this->getModel()],
            'password' => ['required', 'confirmed', Password::defaults()],
            'shop_name' => ['required', 'string']
        ]);

        $user = $this->getModel()::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'shop_name' => $request->shop_name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard($this->getGuard())->login($user);

        return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
    }
}
