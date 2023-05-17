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
    public static function subTotal(array $cartProducts) :string
    {
        $subTotal = 0;
        foreach($cartProducts as $cartProduct){
            $subTotal += $cartProduct->getPrice() * $cartProduct->getQuantity();
        }
        return $subTotal  . ' ' . __('user.shared.currency');
    }
}
