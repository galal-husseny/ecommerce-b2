<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartRequest;
use App\Models\Product;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    use ApiResponses;

    public function add(CartRequest $request)
    {
        $user = User::withCount('carts')->findOrFail($request->user_id);
        if($user->carts->contains($request->product_id)){
            $user->carts()->updateExistingPivot($request->product_id, ['quantity' => DB::raw('quantity + 1')]);
            return $this->data(['carts_count' => ++$user->carts_count] ,'edited in cart successfully', 200);
        }else{
            $user->carts()->attach($request->product_id);
            return $this->data(['carts_count' => ++$user->carts_count], 'added to cart successfully', 201);
        }
    }
}
