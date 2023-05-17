<?php
namespace App\Services;

use App\Entities\CartProducts;

class OrderCalcs
{
    /**
     * shipping
     *
     * @return int
     */
    public static function shipping(): int
    {
        return 50;
    }

    /**
     * subTotal
     *
     * @param  CartProducts $cartProducts
     * @return float
     */
    public static function subTotal(array $cartProducts, float $discount = 0) :string
    {
        $subTotal = 0;
        foreach($cartProducts as $cartProduct){
            $subTotal += $cartProduct->getPrice() * $cartProduct->getQuantity();
        }
        $subTotalAfterDiscount = $subTotal - $discount;
        return $subTotalAfterDiscount  . ' ' . __('user.shared.currency');
    }
}
