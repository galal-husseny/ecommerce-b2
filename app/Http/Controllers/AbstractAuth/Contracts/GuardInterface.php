<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;



interface GuardInterface
{
    /**
     * setGuard
     * @param string $guard authentication guard
     *
     * @return void
     */
    public function setGuard(string $guard) :void;

    /**
     * getGuard
     *
     * @return string
     */
    public function getGuard() :string;

}
