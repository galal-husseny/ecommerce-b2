<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Support\Arr;
use App\Services\OrderCalcs;
use App\Entities\CartProducts;
use App\Entities\ProductEntity;
use App\Http\Controllers\Controller;
use App\Services\ApplyCouponService;
use App\Http\Requests\Order\OrderRequest;

class OrderController extends Controller
{
    public function recipent(OrderRequest $request)
    {
        $user = User::where('id', $request->user)->with(['carts.media'])->first();
        $coupon = Coupon::where('code', $request->coupon)->withCount('users')->first();
        $cartProducts = new CartProducts();
        $shippingValue = OrderCalcs::shipping();
        if (!$user) {
            return ['user' => 'user does not exist'];
        }
        foreach ($user->carts as $product) {
            $cartProduct = new ProductEntity();
            $cartProduct->setPrice($product->sale_price);
            $cartProduct->setQuantity($product->carts->quantity);
            $cartProducts->addProduct($cartProduct);
        }
        $subTotal = OrderCalcs::subTotal($cartProducts);
        if ($coupon) {
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
            $couponCalcs = ApplyCouponService::apply($maxUsageNumberPerUser, $couponUsagePerUser, $orderCouponDiscountValue, $couponMaxDiscountValue, $couponStatus, $couponMaxUsageNumber, $couponUsageCount, $couponMinOrderValue, $couponEndDate, $couponStartDate, $subTotal);
            if (Arr::has($couponCalcs, 'orderTotalAfterDiscount')) {
                return $this->data(array_merge($couponCalcs, ['shipping' => $shippingValue]));
            } else {
                return $this->error($couponCalcs);
            }
        }


        return view();
    }
}
