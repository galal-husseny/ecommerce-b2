<?php
namespace App\Entities;

class ProductEntity implements ProductEntityInterface
{
    private $price, $quantity, $name, $code, $stock;

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
    public function setPrice($price) :void
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
    public function setQuantity(int $quantity) :void
    {
        $this->quantity = $quantity;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    /**
     * Get the value of code
     */
    public function getCode() :string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode(string $code) :void
    {
        $this->code = $code;
    }
    /**
     * Get the value of code
     */
    public function getStock() :int
    {
        return $this->stock;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setStock(int $stock) :void
    {
        $this->stock = $stock;
    }
}
