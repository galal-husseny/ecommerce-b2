<?php
namespace App\Entities;

interface CartProductsInterface
{
    public function addProduct(ProductEntity $cartProduct);

    public function getProducts();
}
