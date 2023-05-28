<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Models\Address;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    use ApiResponses;

    public function store(StoreAddressRequest $request)
    {
        Address::create($request->validated());
        return $this->success('Address created successfully');
    }
}
