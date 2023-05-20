<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressApi\StoreAddressRequest;

class AddressController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::guard('web')->user();
        $addresses = Address::with('region.city')->where('user_id', $user->id)->get();
        $cities = City::active()->get();
        return view('user.address', compact(['addresses', 'cities']));
    }

    public function store(StoreAddressRequest $request)
    {
        Address::create(array_merge($request->validated(), ['user_id' => Auth::guard('web')->id()]));
        return $this->success('Address created successfully');
    }

}
