<?php

namespace App\Services;

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

class ApplyCoupon
{
    public static function apply(int $maxUsageNumberPerUser,int $couponUsagePerUser, float $orderCouponDiscountValue, float $couponMaxDiscountValue, int $couponStatus, int $couponMaxUsageNumber, int $couponUsersCount, float $couponMinOrderValue, $couponEndDate, float $subTotal): array
    {
        if ($maxUsageNumberPerUser <= $couponUsagePerUser) {
            return ['coupon' => 'This user can not use this coupon anymore'];
        }
        if ($orderCouponDiscountValue > $couponMaxDiscountValue) {
            $orderTotal = $subTotal - $couponMaxDiscountValue;
            $discountValue = $couponMaxDiscountValue;
            $discount = round(($discountValue / $subTotal) * 100, 2);
        } else {
            $orderTotal = $orderCouponDiscountValue;
            $discountValue = $orderCouponDiscountValue;
            $discount = round(($discountValue / $subTotal) * 100, 2);
        }
        if ($couponStatus == 0) {
            return ['coupon' => 'This coupon is not active'];
        }
        if ($couponMaxUsageNumber <= $couponUsersCount) {
            return ['coupon' => 'This Coupon reached max number of usage'];
        }
        if ($subTotal < $couponMinOrderValue) {
            return ['coupon' => 'The order value is lower than coupon min vaue to be applied'];
        }
        if (Carbon::now() < $couponEndDate) {
            return ['coupon' => 'This coupon is no longer valid'];
        }
        return ['coupon' => 'coupon applied', 'orderTotalAfterDiscount' => $orderTotal, 'discountPercent' => $discount, 'discountValue' => $discountValue, 'orderTotalBeforeDiscount' => $subTotal];
    }
}
