<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class ApplyCouponService
{
    public static function apply(int $maxUsageNumberPerUser,int $couponUsagePerUser, float $orderCouponDiscountValue, float $couponMaxDiscountValue, int $couponStatus, int $couponMaxUsageNumber, int $couponUsageCount, float $couponMinOrderValue, $couponEndDate, $couponStartDate, float $subTotal): array
    {
        if ($maxUsageNumberPerUser <= $couponUsagePerUser) {
            return ['coupon' => 'This user can not use this coupon anymore'];
        }
        if ($orderCouponDiscountValue > $couponMaxDiscountValue) {
            $orderTotal = $subTotal - $couponMaxDiscountValue;
            $discountValue = $couponMaxDiscountValue;
        } else {
            $orderTotal = $orderCouponDiscountValue;
            $discountValue = $orderCouponDiscountValue;
        }
        $discount = round(($discountValue / $subTotal) * 100, 2);
        if ($couponStatus == 0) {
            return ['coupon' => 'This coupon is not active'];
        }
        if ($couponMaxUsageNumber <= $couponUsageCount) {
            return ['coupon' => 'This Coupon reached max number of usage'];
        }
        if ($subTotal < $couponMinOrderValue) {
            return ['coupon' => 'The order value is lower than coupon min vaue to be applied'];
        }
        if ((Carbon::now()->format('Y-m-d H:i:s') >= $couponStartDate) && (Carbon::now()->format('Y-m-d H:i:s') <= $couponEndDate)) {
            return ['coupon' => 'This coupon is no longer valid'];
        }
        return ['coupon' => 'coupon applied', 'orderTotalAfterDiscount' => $orderTotal, 'discountPercent' => $discount, 'discountValue' => $discountValue, 'orderSubTotal' => $subTotal];
    }
}
