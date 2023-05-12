<?php

namespace App\Http\Controllers\Apis\User;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddress;
use App\Traits\ApiResponses;

class AddressesController extends Controller
{
    use ApiResponses;

    /**
     * store
     *
     * @param  StoreAddress $request
     * @return void
     */
    public function store(StoreAddress $request)
    {
        Address::create($request->validated());
        return $this->success('Address is created successfully');
    }
}
