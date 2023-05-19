<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    use ApiResponses;

    public function index(Request $request)
    {
        $request->validate([
            'city_id' => ['required', 'integer']
        ]);
        $regions = Region::select('id', 'name')->where('city_id', $request->city_id)->get();
        if ($regions->count()) {
            return $this->data($regions->toArray());
        } else {
            return $this->error([
                'city_id' => 'has no regions yet'
            ]);
        }
    }
}
