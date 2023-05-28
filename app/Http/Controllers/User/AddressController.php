<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Models\Region;

class AddressController extends Controller
{
    /**
     * blog
     *
     * @return blog view
     */
    public function index()
    {
        $user = Auth::guard('web')->user();
        $addresses = Address::with('region.city')->where('user_id', $user->id)->get();
        $cities = City::where('status', 1)->get();
        return view('user.address.index', compact('addresses', 'cities'));
    }

    public function store(StoreAddressRequest $request)
    {
        Address::create(array_merge($request->validated(), ['user_id' => Auth::guard('web')->id()]));
        if (session()->get('redirect_url')) {
            $url = session()->get('redirect_url');
            session()->forget('redirect_url');
            return redirect($url);
        }
        return redirect()->back()->with('success', 'Address has been created successfully');
    }

    public function edit(Address $address)
    {
        $address->load('region.city');
        $cities = City::where('status', 1)->get();
        $regions = Region::where('city_id', $address->region->city->id)->get();
        return view('user.address.edit', compact('address', 'cities', 'regions'));
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->back()->with('success', 'Address has been deleted successfully');
    }

    public function update(StoreAddressRequest $request, Address $address)
    {
        $address->update(array_merge($request->validated(), ['user_id' => Auth::guard('web')->id()]));
        return redirect()->route('users.address.index')->with('success', 'Address has been Updated successfully');
    }
}
