<?php

namespace App\Http\Controllers\Apis\User;

use App\Models\User;
use App\Models\Coupon;
use App\Services\OrderCalcs;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Entities\CartProducts;
use App\Entities\ProductEntity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\ApplyCouponRequest;

class ApplyCoupon extends Controller
{
    use ApiResponses;

    public function apply(ApplyCouponRequest $request)
    {
        $cartProducts = new CartProducts();
        $user = User::where('id', $request->user_id)->with(['coupons', 'carts'])->first();
        $coupon = Coupon::where('code', $request->couponCode)->first();
        if(!$user){
            return $this->error(['user' => 'user does not exist']);
        }
        if(!$coupon){
            return $this->error(['coupon' => 'coupon does not exist']);
        }
        foreach($user->carts as $product){
            $cartProduct = new ProductEntity();
            $cartProduct->setPrice($product->sale_price);
            $cartProduct->setQuantity($product->carts->quantity);
            $cartProducts->addProduct($cartProduct);
        }
        $subTotal = OrderCalcs::subTotal($cartProducts);
        return [$user];
    }
}
