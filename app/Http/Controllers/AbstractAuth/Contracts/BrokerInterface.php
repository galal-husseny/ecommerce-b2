<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface BrokerInterface
{
    /**
     * setBroker
     *
     * @param  string $broker
     * @return void
     */
    public function setBroker(string $broker) :void;

    /**
     * getBroker
     *
     * @return string
     */
    public function getBroker() :string;
}
