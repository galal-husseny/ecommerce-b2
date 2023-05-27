<?php
namespace App\Entities;

class ApplyCouponErrorEntity implements ApplyCouponErrorInterface
{
    private $coupon;


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
}
