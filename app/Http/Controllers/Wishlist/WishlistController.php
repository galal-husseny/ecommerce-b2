<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlist\WishlistRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;


class WishlistController extends Controller
{
    use ApiResponses;

    public function add(WishlistRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        if($user->wishlists->contains($request->product_id)){
            $user->wishlists()->detach($request->product_id);
            return $this->data(['wishlist_counts' => $user->wishlists()->count()],'',204);
        }else{
            $user->wishlists()->attach($request->product_id);
            return $this->data(['wishlist_counts' => $user->wishlists()->count()],'',200);
        }
    }
}
