<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Region;
use App\Models\Address;
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
        return view('user.address.index', compact(['addresses', 'cities']));
    }

    public function store(StoreAddressRequest $request)
    {
        Address::create(array_merge($request->validated(), ['user_id' => Auth::guard('web')->id()]));
        if (session()->has('redirect_url')){
            $url = session()->get('redirect_url');
            session()->forget('redirect_url');
            return redirect($url);
        }
        return redirect()->back()->with('success', __('general.messages.created'));
    }

    public function edit(Address $address)
    {
        $address->load('region.city');
        $cities = City::active()->get();
        $regions = Region::where('city_id', $address->region->city->id)->get();
        return view('user.address.edit', compact('address', 'cities', 'regions'));
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->back()->with('success', __('general.messages.deleted'));
    }

    public function update(StoreAddressRequest $request, Address $address)
    {
        $address->update(array_merge($request->validated(), ['user_id' => Auth::guard('web')->id()]));
        return redirect()->route('users.address.index')->with('success', __('general.messages.updated'));
    }

}
