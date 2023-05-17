<?php
namespace App\Entities;

interface ProductEntityInterface
{
    public function getPrice(): float;
    public function setPrice(float $price);
    public function getQuantity(): int;
    public function setQuantity(int $quantity);
}
