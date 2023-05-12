<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * cart
     *
     * @return cart view
     */
    public function cart()
    {
        if(Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user()->with(['wishlists', 'carts'])->withCount('carts', 'wishlists')->first();
        }

        return view('user.cart', compact('user'));
    }
}
