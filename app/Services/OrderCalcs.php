<?php
namespace App\Services;

class OrderCalcs
{
    public static function shipping(): int
    {
        return 50;
    }

    public static function subTotal(array $products, float $discount = 0): int
    {
        $subTotal = 0;
        foreach ($products as $product) {
            $subTotal += ($product->getPrice() * $product->getQuantity());
        }
        $subTotalAfterDiscount = $subTotal - $discount;
        return $subTotalAfterDiscount;
    }
}
