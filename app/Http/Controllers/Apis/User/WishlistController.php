<?php
namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlist\WishlistRequest;
use App\Models\User;
use App\Traits\ApiResponses;


class WishlistController extends Controller
{
    use ApiResponses;

    public function handle(WishlistRequest $request)
    {
        $user = User::withCount('wishlists')->findOrFail($request->user_id);
        if($user->wishlists->contains($request->product_id)){
            $user->wishlists()->detach($request->product_id);
            return $this->data(['wishlists_count' => --$user->wishlists_count],'',200);
        }else{
            $user->wishlists()->attach($request->product_id);
            return $this->data(['wishlists_count' => ++$user->wishlists_count],'',200);
        }
    }
}
