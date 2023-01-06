<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface ViewPrefixInterface
{
    /**
     * setViewPrefix
     *
     * @param  string $viewPrefix
     * @return void
     */
    public function setViewPrefix(string $viewPrefix) :void;

    /**
     * getViewPrefix
     *
     * @return string
     */
    public function getViewPrefix() :string;
}
