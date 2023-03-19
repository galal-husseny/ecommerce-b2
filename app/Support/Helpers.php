<?php

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

if(! function_exists('getProviderFromModel')){
    /**
     * getProviderFromModel
     *
     * @param  Model $model
     * @return string
     */
    function getProviderFromModel (Model $model) :?string {
        foreach (config('auth.providers') as $provider => $values)
        {
            if ($model instanceof $values['model']) {
                return $provider;
            }
        }
        return null;
    }
}


if(! function_exists('getGuardFromProvider')){
    /**
     * getGuardFromProvider
     *
     * @param  string $provider
     * @return string or null
     */
    function getGuardFromProvider (string $provider) :?string {
        foreach (config('auth.guards') as $guard => $values)
        {
            if ($provider == $values['provider']) {
                return $guard;
            }
        }
        return null;
    }
}


if(! function_exists('getGuardFromModel')){
    /**
     * getGuardFromModel
     *
     * @param  Model $model
     * @return string
     */
    function getGuardFromModel (Model $model) :?string {
        $provider = getProviderFromModel($model);
        return getGuardFromProvider($provider);
    }
}



function getRouteGuardMap(string $guard) :string
{
    return config('auth.route_guard_map')[$guard] ?? 'users.';
}
