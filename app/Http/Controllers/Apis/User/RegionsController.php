<?php

namespace App\Http\Controllers\Apis\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionApi\RegionApiRequest;
use App\Models\Region;
use App\Traits\ApiResponses;

class RegionsController extends Controller
{
    use ApiResponses;

    public function index(RegionApiRequest $request)
    {
        $regions = Region::select('id','name')->where('city_id', $request->validated())->get();
        if($regions->count()){
            return $this->data($regions->toArray());
        }else {
            return $this->error([
                'city_id' => 'This city has no regions yet'
            ]);
        }
    }
}
