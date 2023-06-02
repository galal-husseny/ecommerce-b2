<?php
namespace App\Entities;

interface ApplyCouponErrorInterface
{
    public function getCoupon(): string;
    public function setCoupon(string $coupon);
}
