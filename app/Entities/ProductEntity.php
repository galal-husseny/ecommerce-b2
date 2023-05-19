<?php
namespace App\Entities;

class ProductEntity implements ProductEntityInterface
{
    private $price,$quantity;

    /**
     * Get the value of price
     */
    public function getPrice():float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

    }

    /**
     * Get the value of quantity
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
}
