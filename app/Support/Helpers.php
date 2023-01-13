<?php

use Illuminate\Database\Eloquent\Model;

function getProviderFromModel (Model $model) :?string {
    foreach (config('auth.providers') as $provider => $values)
    {
        if ($model instanceof $values['model']) {
            return $provider;
        }
    }
    return null;
}

function getGuardFromProvider (string $provider) :?string {
    foreach (config('auth.guards') as $guard => $values)
    {
        if ($provider == $values['provider']) {
            return $guard;
        }
    }
    return null;
}

function getGuardFromModel (Model $model) :?string {
    $provider = getProviderFromModel($model);
    return getGuardFromProvider($provider);
}


function getRouteGuardMap(string $guard) :string
{
    return config('auth.route_guard_map')[$guard] ?? 'users.';
}