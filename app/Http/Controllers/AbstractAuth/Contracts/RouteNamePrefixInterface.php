<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface RouteNamePrefixInterface
{

    /**
     * setRouteNamePrefix
     *
     * @param  string $routeNamePrefix
     * @return void
     */
    public function setRouteNamePrefix(string $routeNamePrefix) :void;

    /**
     * getRouteNamePrefix
     *
     * @return string
     */
    public function getRouteNamePrefix() :string;

}
