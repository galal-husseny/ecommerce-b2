<?php

namespace App\Services;

use App\Entities\ApplyCouponDataEntity;
use App\Entities\ApplyCouponErrorEntity;
use Illuminate\Support\Carbon;

class ApplyCouponService
{
    public static function apply(
        int $maxUsageNumberPerUser,
        int $couponUsagePerUser,
        float $orderCouponDiscountValue,
        float $couponMaxDiscountValue,
        int $couponStatus,
        int $couponMaxUsageNumber,
        int $couponUsageCount,
        float $couponMinOrderValue,
        $couponEndDate,
        $couponStartDate,
        float $subTotal
    ) {
        $couponReturnError = new ApplyCouponErrorEntity();
        $couponReturnData = new ApplyCouponDataEntity();
        if ($maxUsageNumberPerUser <= $couponUsagePerUser) {
            $couponReturnError->setCoupon('This user can not use this coupon anymore');
            return $couponReturnError;
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
            $couponReturnError->setCoupon('This coupon is not active');
            return $couponReturnError;
        }
        if ($couponMaxUsageNumber <= $couponUsageCount) {
            $couponReturnError->setCoupon('This Coupon reached max number of usage');
            return $couponReturnError;
        }
        if ($subTotal < $couponMinOrderValue) {
            $couponReturnError->setCoupon('The order value is lower than coupon min vaue to be applied');
            return $couponReturnError;
        }
        if ((Carbon::now()->format('Y-m-d H:i:s') >= $couponStartDate) && (Carbon::now()->format('Y-m-d H:i:s') <= $couponEndDate)) {
            $couponReturnError->setCoupon('This coupon is no longer valid');
            return $couponReturnError;
        }
        $couponReturnData->setCoupon('coupon applied');
        $couponReturnData->setOrderTotalAfterDiscount($orderTotal);
        $couponReturnData->setDiscountPercent($discount);
        $couponReturnData->setDiscountValue($discountValue);
        $couponReturnData->setOrderSubTotal($subTotal);
        return $couponReturnData;
    }
}
