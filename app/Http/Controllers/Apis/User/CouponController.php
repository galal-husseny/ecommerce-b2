<?php

namespace App\Http\Controllers\Apis\User;

use App\Entities\ApplyCouponDataEntity;
use App\Models\User;
use App\Models\Coupon;
use App\Services\OrderCalcs;
use App\Traits\ApiResponses;
use App\Entities\CartProducts;
use App\Entities\ProductEntity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\ApplyCouponRequest;
use App\Services\ApplyCouponService;
use Illuminate\Support\Arr;

class CouponController extends Controller
{
    use ApiResponses;

    public function apply(ApplyCouponRequest $request)
    {
        $cartProducts = new CartProducts();
        $user = User::where('id', $request->user_id)->with(['coupons', 'carts'])->first();
        $coupon = Coupon::where('code', $request->couponCode)->withCount('users')->first();
        $shippingValue = OrderCalcs::shipping();
        if (!$user) {
            return $this->error(['user' => 'user does not exist']);
        }
        if (!$coupon) {
            return $this->error(['coupon' => 'coupon does not exist']);
        }
        foreach ($user->carts as $product) {
            $cartProduct = new ProductEntity();
            $cartProduct->setPrice($product->sale_price);
            $cartProduct->setQuantity($product->carts->quantity);
            $cartProducts->addProduct($cartProduct);
        }
        $subTotal = OrderCalcs::subTotal($cartProducts);
        $userCoupon = $user->with(['coupons' =>  function ($query) use ($coupon) {
            $query->where('coupon_id', $coupon->id);
        }])->first();
        $couponUsagePerUser = 0;
        foreach ($userCoupon->coupons as $dbCoupon) {
            if ($dbCoupon->code == $coupon->code) {
                $couponUsagePerUser = $dbCoupon->pivot->max_no_of_usage;
            }
        }
        $maxUsageNumberPerUser = $coupon->max_usage_number_per_user;
        $orderCouponDiscountValue = $subTotal * (($coupon->discount / 100));
        $couponMaxDiscountValue = $coupon->max_discount_value;
        $couponStatus = $coupon->status;
        $couponMaxUsageNumber = $coupon->max_usage_number;
        $couponUsageCount = $coupon->users_count;
        $couponMinOrderValue = $coupon->min_order_value;
        $couponEndDate = $coupon->end_date;
        $couponStartDate = $coupon->start_at;
        $couponCalcs = ApplyCouponService::apply(
            $maxUsageNumberPerUser,
            $couponUsagePerUser,
            $orderCouponDiscountValue,
            $couponMaxDiscountValue,
            $couponStatus,
            $couponMaxUsageNumber,
            $couponUsageCount,
            $couponMinOrderValue,
            $couponEndDate,
            $couponStartDate,
            $subTotal
        );
        if ($couponCalcs instanceof ApplyCouponDataEntity) {
            $couponCalcs->setShipping($shippingValue);
            return $this->data([
                'coupon' => $couponCalcs->getCoupon(),
                'orderTotalAfterDiscount' => $couponCalcs->getOrderTotalAfterDiscount(),
                'discountPercent' => $couponCalcs->getDiscountPercent(),
                'discountValue' => $couponCalcs->getDiscountValue(),
                'orderSubTotal' => $couponCalcs->getOrderSubTotal(),
                'shipping' => $couponCalcs->getShipping()
            ]);
        }
        return $this->error(['coupon' => $couponCalcs->getCoupon()]);
    }
}
