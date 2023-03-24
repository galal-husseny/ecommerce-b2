<?php

use App\Models\Product;
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


if (! function_exists('productCode')) {
    function productCode(string $name): ?string
    {
        $id = (int)Product::max('id') + 1000;
        if (empty($name)) {
            return null;
        }
        $firstCharacter = strtoupper($name[0]);
        return "{$firstCharacter}{$id}";
    }
}


if (! function_exists('printEnum')) {
    function printEnum($enum,mixed $value): string
    {
        return ucfirst(strtolower(str_replace('_',' ', $enum::tryFrom($value)?->name)));
    }
}
