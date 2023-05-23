<?php

namespace App\Services;

use App\Models\User;
use App\Models\Coupon;

class OrderCalcs
{
    public static function apply(float $subTotal, User $user, Coupon $coupon): int
    {
        if ($coupon->status == 0) {
            return ['coupon' => 'This coupon is not active'];
        }
        if ($coupon->max_usage_number <= $user->coupons->pivot->max_no_of_users_per_coupon) {
            return ['coupon' => 'This Coupon reached max number of usage'];
        }
        if ($coupon->max_usage_number_per_user <= $user->coupons_count) {
            return ['coupon' => 'This user can not use this coupon anymore'];
        }
        if ($request->orderTotal < $coupon->min_order_value) {
            return ['coupon' => 'The order value is lower than coupon min vaue to be applied'];
        }
        if ($request->couponApplyDate > $coupon->end_date) {
            return ['coupon' => 'This coupon is no longer valid'];
        }
        if ($request->orderTotal * (($coupon->discount / 100)) > $coupon->max_discount_value) {
            $orderTotal = $request->orderTotal - $coupon->max_discount_value;
        } else {
            $orderTotal = $request->orderTotal * ($coupon->discount / 100);
        }
        return [$orderTotal];

        return 50;
    }
}
