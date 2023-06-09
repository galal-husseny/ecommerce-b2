<?php

namespace App\Entities;

use App\Entities\Contracts\AdminOrderMailEntityInterface;
use App\Entities\Contracts\SellerOrderMailEntityInterface;

class AdminOrderMailEntity implements AdminOrderMailEntityInterface
{
    private string $sellerName;
    private string $sellerShopName;
    private string $sellerEmail;
    private string $sellerPhone;
    private string $userAddress;
    private string $userName;
    private string $userEmail;
    private ?string $coupon;
    private string $orderCode;
    private string $orderCreationDate;
    private string $orderDeliveryDate;
    private array $products;
    private float $total;
    private float $subTotal;
    private float $discount;
    private float $shipping;
    private array $sellers = [];
    private string $adminEmail;



    /**
         * getUserName
         *
         * @return string
         */
    public function getUserName(): string
    {
        return $this->userName;
    }
    /**
         * setUserName
         *
         * @param  mixed $name
         * @return void
         */
    public function setUserName(string $name): void
    {
        $this->userName = $name;
    }
    /**
         * getUserEmail
         *
         * @return string
         */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }
    /**
         * setUserEmail
         *
         * @param  mixed $email
         * @return void
         */
    public function setUserEmail(string $email): void
    {
        $this->userEmail = $email;
    }
    /**
         * getUserAddress
         *
         * @return string
         */
    public function getUserAddress(): string
    {
        return $this->userAddress;
    }
    /**
         * setUserAddress
         *
         * @param  mixed $address
         * @return void
         */
    public function setUserAddress(string $address): void
    {
        $this->userAddress = $address;
    }

    /**
         * getProducts
         *
         * @return array
         */
    public function getProducts(): array
    {
        return $this->products;
    }
    /**
         * setProducts
         *
         * @param  mixed $products
         * @return void
         */
    public function setProducts(ProductEntityInterface $product): void
    {
        $this->products[] = $product;
    }

    /**
         * getTotal
         *
         * @return float
         */
    public function getTotal(): float
    {
        return $this->total;
    }
    /**
         * setTotal
         *
         * @param  mixed $total
         * @return void
         */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }
    /**
         * getSubTotal
         *
         * @return float
         */
    public function getSubTotal(): float
    {
        return $this->subTotal;
    }
    /**
         * setSubTotal
         *
         * @param  mixed $subTotal
         * @return void
         */
    public function setSubTotal(float $subTotal): void
    {
        $this->subTotal = $subTotal;
    }
    /**
         * getDiscount
         *
         * @return float
         */
    public function getDiscount(): float
    {
        return $this->discount;
    }
    /**
         * setDiscount
         *
         * @param  mixed $discount
         * @return void
         */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }
    /**
         * getShipping
         *
         * @return float
         */
    public function getShipping(): float
    {
        return $this->shipping;

    }
    /**
         * setShipping
         *
         * @param  mixed $shipping
         * @return void
         */
    public function setShipping(float $shipping): void
    {
        $this->shipping = $shipping;

    }

    /**
         * getCoupon
         *
         * @return string
         */
    public function getCoupon(): ?string
    {
        return $this->coupon;
    }
    /**
         * setCoupon
         *
         * @param  mixed $coupon
         * @return void
         */
    public function setCoupon(?string $coupon): void
    {
        $this->coupon = $coupon;
    }

    /**
     * Get the value of sellerName
     */
    public function getSellerName():string
    {
        return $this->sellerName;
    }

    /**
     * Set the value of sellerName
     *
     * @return  self
     */
    public function setSellerName(string $sellerName) :void
    {
        $this->sellerName = $sellerName;
    }

    /**
     * Get the value of sellerShopName
     */
    public function getSellerShopName() :string
    {
        return $this->sellerShopName;
    }

    /**
     * Set the value of sellerShopName
     *
     * @return  self
     */
    public function setSellerShopName($sellerShopName) :void
    {
        $this->sellerShopName = $sellerShopName;
    }

    /**
     * Get the value of sellerEmail
     */
    public function getSellerEmail() :string
    {
        return $this->sellerEmail;
    }

    /**
     * Set the value of sellerEmail
     *
     * @return  self
     */
    public function setSellerEmail($sellerEmail) :void
    {
        $this->sellerEmail = $sellerEmail;
    }

    /**
     * Get the value of sellerPhone
     */
    public function getSellerPhone() :string
    {
        return $this->sellerPhone;
    }

    /**
     * Set the value of sellerPhone
     *
     * @return  self
     */
    public function setSellerPhone(string $sellerPhone) :void
    {
        $this->sellerPhone = $sellerPhone;
    }

    /**
     * Get the value of orderCode
     */
    public function getOrderCode() :string
    {
        return $this->orderCode;
    }

    /**
     * Set the value of orderCode
     *
     * @return  self
     */
    public function setOrderCode($orderCode) :void
    {
        $this->orderCode = $orderCode;
    }

    /**
     * Get the value of orderCreationDate
     */
    public function getOrderCreationDate() :string
    {
        return $this->orderCreationDate;
    }

    /**
     * Set the value of orderCreationDate
     *
     * @return  self
     */
    public function setOrderCreationDate($orderCreationDate) :void
    {
        $this->orderCreationDate = $orderCreationDate;
    }

    /**
     * Get the value of orderDeliveryDate
     */
    public function getOrderDeliveryDate() :string
    {
        return $this->orderDeliveryDate;
    }

    /**
     * Set the value of orderDeliveryDate
     *
     * @return  self
     */
    public function setOrderDeliveryDate($orderDeliveryDate) :void
    {
        $this->orderDeliveryDate = $orderDeliveryDate;
    }

    /**
     * Get the value of sellers
     */
    public function getSellers() :array
    {
        return $this->sellers;
    }

    /**
     * Set the value of sellers
     *
     * @return  self
     */
    public function setSellers(AdminOrderMailEntityInterface $seller) :void
    {
        $this->sellers[] = $seller;
    }

    /**
     * Get the value of adminEmail
     */
    public function getAdminEmail() :string
    {
        return $this->adminEmail;
    }

    /**
     * Set the value of adminEmail
     *
     * @return  self
     */
    public function setAdminEmail(string $adminEmail) :void
    {
        $this->adminEmail = $adminEmail;
    }
}
