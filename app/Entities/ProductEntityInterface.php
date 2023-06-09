<?php
namespace App\Entities;

interface ProductEntityInterface
{
    public function getPrice(): float;
    public function setPrice(float $price) :void;
    public function getQuantity(): int;
    public function setQuantity(int $quantity) :void ;
    public function getStock(): int;
    public function setStock(int $stock) :void;
    public function getName(): string;
    public function setName(string $name) :void;
    public function getCode(): string;
    public function setCode(string $code) :void;
}
