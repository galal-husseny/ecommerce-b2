<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Services\OrderCalcs;
use App\Entities\CartProducts;
use App\Entities\ProductEntity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * cart
     *
     * @return cart view
     */
    public function cart(CartProducts $cartProducts, OrderCalcs $orderCalcs)
    {
        if(Auth::guard('web')->check()){
            $user = Auth::guard('web')->user()->with(['wishlists','carts', 'addresses.region.city'])->withCount('carts','wishlists')->first();
            foreach($user->carts as $product){
                $cartProduct = new ProductEntity();
                $cartProduct->setPrice($product->sale_price);
                $cartProduct->setQuantity($product->carts->quantity);
                $cartProducts->addProduct($cartProduct);
            }
            $subTotal = OrderCalcs::subTotal($cartProducts);
            $shipping = OrderCalcs::shipping();
            return view('user.cart', compact(['user', 'subTotal', 'shipping']));
        }
    }
}
