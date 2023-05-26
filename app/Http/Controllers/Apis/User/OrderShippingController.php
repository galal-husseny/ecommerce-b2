<?php

namespace App\Http\Controllers\Apis\User;

use App\Traits\ApiResponses;
use App\Http\Controllers\Controller;
use App\Services\OrderCalcs;

class OrderShippingController extends Controller
{
    use ApiResponses;

    public function shipping()
    {
        return $this->data(['shipping' => OrderCalcs::shipping()]);
    }
}
