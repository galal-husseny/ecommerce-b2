<?php
namespace App\Entities;

interface ApplyCouponDataInterface
{
    public function getCoupon(): string;
    public function setCoupon(string $coupon);
    public function getOrderTotalAfterDiscount(): float;
    public function setOrderTotalAfterDiscount(float $orderTotalAfterDiscount);
    public function getDiscountPercent(): float;
    public function setDiscountPercent(float $discountPercent);
    public function getDiscountValue(): float;
    public function setDiscountValue(float $discountValue);
    public function getOrderSubTotal(): float;
    public function setOrderSubTotal(float $subTotal);
    public function getShipping(): float;
    public function setShipping(float $shipping);
}
