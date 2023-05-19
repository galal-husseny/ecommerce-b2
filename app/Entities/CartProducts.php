<?php
namespace App\Entities;

class CartProducts implements CartProductsInterface
{
    private $cartProducts = [];

    public function addProduct(ProductEntity $cartProduct)
    {
        $this->cartProducts []= $cartProduct;
    }

    public function getProducts()
    {
        return $this->cartProducts;
    }
}
