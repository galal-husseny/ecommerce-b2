<?php

namespace App\Services;

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

class ApplyCoupon
{
    public static function apply(float $subTotal, User $user, Coupon $coupon): array
    {
        foreach ($user->coupons as $userCoupon) {
            if ($userCoupon->code == $coupon->code) {
                $couponUsagePerUser = $userCoupon->pivot->max_no_of_users_per_coupon;
                if ($coupon->max_usage_number_per_user <= $couponUsagePerUser) {
                    return ['coupon' => 'This user can not use this coupon anymore'];
                }
            }
        }
        if ($subTotal * (($coupon->discount / 100)) > $coupon->max_discount_value) {
            $orderTotal = $subTotal - $coupon->max_discount_value;
            $discountValue = $coupon->max_discount_value;
            $discount = round(($discountValue / $subTotal) * 100, 2);
        } else {
            $orderTotal = $subTotal * ($coupon->discount / 100);
            $discountValue = $subTotal * ($coupon->discount / 100);
            $discount = round(($discountValue / $subTotal) * 100, 2);
        }
        if ($coupon->status == 0) {
            return ['coupon' => 'This coupon is not active'];
        }
        if ($coupon->max_usage_number <= $coupon->users_count) {
            return ['coupon' => 'This Coupon reached max number of usage'];
        }
        if ($subTotal < $coupon->min_order_value) {
            return ['coupon' => 'The order value is lower than coupon min vaue to be applied'];
        }
        if (Carbon::now() < $coupon->end_date) {
            return ['coupon' => 'This coupon is no longer valid'];
        }
        return ['coupon' => 'coupon applied', 'orderTotalAfterDiscount' => $orderTotal, 'discountPercent' => $discount, 'discountValue' => $discountValue, 'orderTotalBeforeDiscount' => $subTotal];
    }

    // public static function apply(float $subTotal, int $couponUsagePerUser, int $maxUsageNumberPerUser, float $discount, float $maxDiscountValue, string $code, int $couponStatus, int $maxUsageNumber, float $minOrderValue, string $endDate, int $usersCount): array
    // {
    //     if ($subTotal * (($discount / 100)) > $maxDiscountValue) {
    //         $orderTotal = $subTotal - $maxDiscountValue;
    //         $discountValue = $maxDiscountValue;
    //         $discount = round(($discountValue / $subTotal) * 100, 2);
    //     } else {
    //         $orderTotal = $subTotal * ($discount / 100);
    //         $discountValue = $subTotal * ($discount / 100);
    //         $discount = round(($discountValue / $subTotal) * 100, 2);
    //     }
    //     if ($couponStatus == 0) {
    //         return ['coupon' => 'This coupon is not active'];
    //     }
    //     if ($maxUsageNumber <= $usersCount) {
    //         return ['coupon' => 'This Coupon reached max number of usage'];
    //     }
    //     if ($subTotal < $minOrderValue) {
    //         return ['coupon' => 'The order value is lower than coupon min value to be applied'];
    //     }
    //     if (Carbon::now() > Carbon::parse($endDate)) {
    //         return ['coupon' => 'This coupon is no longer valid'];
    //     }
    //     if ($maxUsageNumberPerUser <= $couponUsagePerUser) {
    //         return ['coupon' => 'This user can not use this coupon anymore'];
    //     }
    //     return [
    //         'coupon' => 'coupon applied',
    //         'orderTotalAfterDiscount' => $orderTotal,
    //         'discountPercent' => $discount,
    //         'discountValue' => $discountValue,
    //         'orderTotalBeforeDiscount' => $subTotal,
    //     ];
    // }
}
