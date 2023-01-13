<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\AbstractAuth\Auth\NewPasswordController as AbstractNewPasswordController;

class NewPasswordController extends AbstractNewPasswordController
{
    /**
     * broker
     *
     * @var string
    */
    private $broker = "sellers";

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
     * Get Broker
     *
     * @return  string
    */
    public function getBroker() :string
    {
        return $this->broker;
    }

    /**
     * Set Broker
     *
     * @param  string  $broker  broker
     *
     * @return  void
    */
    public function setBroker(string $broker) :void
    {
        $this->broker = $broker;
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
