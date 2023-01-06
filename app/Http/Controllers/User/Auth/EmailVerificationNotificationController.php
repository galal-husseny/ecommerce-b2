<?php
namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\AbstractAuth\Auth\EmailVerificationNotificationController as AbstractEmailVerificationNotificationController;

class EmailVerificationNotificationController extends AbstractEmailVerificationNotificationController
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

}
