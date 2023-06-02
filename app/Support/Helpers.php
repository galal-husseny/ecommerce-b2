<?php

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
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



if(! function_exists('getRouteGuardMap')){
    /**
     * getRouteGuardMap
     *
     * @param  string $guard
     * @return string
     */
    function getRouteGuardMap(string $guard) :string
        {
            return config('auth.route_guard_map')[$guard] ?? 'users.';
        }
}

if(! function_exists('productCode')){
    /**
     * productCode
     *
     * @param  string $name
     * @return string
     */
    function productCode(string $name) :?string
    {
        if(empty($name)){
            return null;
        }
        $id = (int)Product::max('id') + 1000;
        return strtoupper($name[0]).$id;
    }
}

if(! function_exists('printEnum')){
    function printEnum($enum , mixed $value) :string
    {
        return strtolower($enum::tryFrom($value)?->name);
    }
}


if (! function_exists('printEnum')) {
    function printEnum($enum,mixed $value): string
    {
        return ucfirst(strtolower(str_replace('_',' ', $enum::tryFrom($value)?->name)));
    }
}

if (! function_exists('couponCode')){
    /**
     * couponCode
     *
     * @return string
     */
    function couponCode() :int
    {
        $id = (int)Coupon::max('id') + 1000;
        return $id;
    }
}

if (! function_exists('orderCode')){
    /**
     * orderCode
     *
     * @return string
     */
    function orderCode() :int
    {
        $id = (int)Order::max('id') . Carbon::now()->format('Ymd');
        return $id;
    }
}
