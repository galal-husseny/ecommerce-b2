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
use App\Services\ApplyCoupon as ServicesApplyCoupon;
use Illuminate\Support\Arr;

class ApplyCoupon extends Controller
{
    use ApiResponses;

    public function apply(ApplyCouponRequest $request)
    {
        $cartProducts = new CartProducts();
        $user = User::where('id', $request->user_id)->with(['coupons', 'carts'])->first();
        $coupon = Coupon::where('code', $request->couponCode)->withCount('users')->first();
        if(!$user){
            return $this->error(['user' => 'user does not exist']);
        }
        if(!$coupon){
            return $this->error(['coupon' => 'coupon does not exist']);
        }
        // return [$user];
        foreach($user->carts as $product){
            $cartProduct = new ProductEntity();
            $cartProduct->setPrice($product->sale_price);
            $cartProduct->setQuantity($product->carts->quantity);
            $cartProducts->addProduct($cartProduct);
        }
        $subTotal = OrderCalcs::subTotal($cartProducts);
        foreach ($user->coupons as $userCoupon) {
            if ($userCoupon->code == $coupon->code) {
                $couponUsagePerUser = $userCoupon->pivot->max_no_of_users_per_coupon;
            }
        }
        $maxUsageNumberPerUser = $coupon->max_usage_number_per_user;
        $orderCouponDiscountValue = $coupon->max_usage_number_per_user;
        $orderCouponDiscountValue = $subTotal * (($coupon->discount / 100));
        $couponMaxDiscountValue = $coupon->max_discount_value;
        $couponStatus = $coupon->status;
        $couponMaxUsageNumber = $coupon->max_usage_number;
        $couponUsersCount = $coupon->users_count;
        $couponMinOrderValue =$coupon->min_order_value;
        $couponEndDate = $coupon->end_date;
        $couponCalcs = ServicesApplyCoupon::apply($maxUsageNumberPerUser, $couponUsagePerUser, $orderCouponDiscountValue, $couponMaxDiscountValue, $couponStatus, $couponMaxUsageNumber, $couponUsersCount, $couponMinOrderValue, $couponEndDate, $subTotal);
        if(Arr::has($couponCalcs, 'orderTotalAfterDiscount')){
            return $this->data($couponCalcs);
        }else{
            return $this->error($couponCalcs);
        }
    }
}
