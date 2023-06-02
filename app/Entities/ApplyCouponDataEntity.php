<?php
namespace App\Entities;

class ApplyCouponDataEntity implements ApplyCouponDataInterface
{
    private $coupon,
    $orderTotalAfterDiscount,
    $discountPercent,
    $discountValue,
    $orderSubTotal,
    $shipping;


    /**
     * Get the value of coupon
     */
    public function getCoupon():string
    {
        return $this->coupon;
    }

    /**
     * Set the value of coupon
     *
     * @return  self
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Get the value of orderTotalAfterDiscount
     */
    public function getOrderTotalAfterDiscount(): float
    {
        return $this->orderTotalAfterDiscount;
    }

    /**
     * Set the value of orderTotalAfterDiscount
     *
     * @return  self
     */
    public function setOrderTotalAfterDiscount($orderTotalAfterDiscount)
    {
        $this->orderTotalAfterDiscount = $orderTotalAfterDiscount;

        return $this;
    }

    /**
     * Get the value of discountPercent
     */
    public function getDiscountPercent(): float
    {
        return $this->discountPercent;
    }

    /**
     * Set the value of discountPercent
     *
     * @return  self
     */
    public function setDiscountPercent(float $discountPercent)
    {
        $this->discountPercent = $discountPercent;

        return $this;
    }

    /**
     * Get the value of orderSubTotal
     */
    public function getOrderSubTotal(): float
    {
        return $this->orderSubTotal;
    }

    /**
     * Set the value of orderSubTotal
     *
     * @return  self
     */
    public function setOrderSubTotal($orderSubTotal)
    {
        $this->orderSubTotal = $orderSubTotal;

        return $this;
    }

    /**
     * Get the value of discountValue
     */
    public function getDiscountValue(): float
    {
        return $this->discountValue;
    }

    /**
     * Set the value of discountValue
     *
     * @return  self
     */
    public function setDiscountValue($discountValue)
    {
        $this->discountValue = $discountValue;

        return $this;
    }

    /**
     * Get the value of shipping
     */
    public function getShipping(): float
    {
        return $this->shipping;
    }

    /**
     * Set the value of shipping
     *
     * @return  self
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }
}
