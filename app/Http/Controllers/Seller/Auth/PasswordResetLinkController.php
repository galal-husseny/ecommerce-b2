<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\AbstractAuth\Auth\PasswordResetLinkController as AbstractPasswordResetLinkController;

class PasswordResetLinkController extends AbstractPasswordResetLinkController
{
    /**
     * broker
     *
     * @var string
    */
    private $broker = "sellers";

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
