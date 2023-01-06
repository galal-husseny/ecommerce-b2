<?php
namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\AbstractAuth\Auth\AuthenticatedSessionController as AbstractAuthenticatedSessionController ;

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
}
