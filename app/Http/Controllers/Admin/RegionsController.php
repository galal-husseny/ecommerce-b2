<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Region\StoreRegionRequest as RegionStoreRegionRequest;
use App\Http\Requests\Region\UpdateRegionRequest;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::with('city')->get();
        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::select(['id','name'])->get();
        return view('admin.regions.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionStoreRegionRequest $request)
    {
        // dd($request->validated());
        Region::create($request->validated());
        return redirect()->route('admins.regions.index')->with('success', __('general.messages.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->validated());
        return redirect()->route('admins.regions.index')->with('success', __('general.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        try{
            $region->delete();
            return redirect()->route('admins.regions.index')->with('success', __('general.messages.deleted'));
        }
        catch (\Exception $error){
            return redirect()->route('admins.regions.index')->with('error', __('general.regions.failed'));
        }

    }
}
