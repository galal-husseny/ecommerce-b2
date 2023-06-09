<?php
namespace App\Entities\Contracts;

use App\Entities\ProductEntityInterface;

interface OrderMailEntityInterface
{
    /**
     * getUserName
     *
     * @return string
     */
    public function getUserName() :string;
    /**
     * setUserName
     *
     * @param  mixed $name
     * @return void
     */
    public function setUserName(string $name) :void;
    /**
     * getUserEmail
     *
     * @return string
     */
    public function getUserEmail() :string;
    /**
     * setUserEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setUserEmail(string $email) :void;
    /**
     * getUserAddress
     *
     * @return string
     */
    public function getUserAddress() :string;
    /**
     * setUserAddress
     *
     * @param  mixed $address
     * @return void
     */
    public function setUserAddress(string $address) :void;

    /**
     * getProducts
     *
     * @return array
     */
    public function getProducts() :array;
    /**
     * setProducts
     *
     * @param  mixed $products
     * @return void
     */
    public function setProducts(ProductEntityInterface $products) :void;

    /**
     * getTotal
     *
     * @return float
     */
    public function getTotal() :float;
    /**
     * setTotal
     *
     * @param  mixed $total
     * @return void
     */
    public function setTotal(float $total) :void;
    /**
     * getSubTotal
     *
     * @return float
     */
    public function getSubTotal() :float;
    /**
     * setSubTotal
     *
     * @param  mixed $subTotal
     * @return void
     */
    public function setSubTotal(float $subTotal) :void;
    /**
     * getDiscount
     *
     * @return float
     */
    public function getDiscount() :float;
    /**
     * setDiscount
     *
     * @param  mixed $discount
     * @return void
     */
    public function setDiscount(float $discount) :void;
    /**
     * getShipping
     *
     * @return float
     */
    public function getShipping() :float;
    /**
     * setShipping
     *
     * @param  mixed $shipping
     * @return void
     */
    public function setShipping(float $shipping) :void;

    /**
     * getCoupon
     *
     * @return string
     */
    public function getCoupon() :?string;
    /**
     * setCoupon
     *
     * @param  mixed $coupon
     * @return void
     */
    public function setCoupon(?string $coupon) :void;

    /**
     * getOrderCode
     *
     * @return string
     */
    public function getOrderCode() :string;
    /**
     * setOrderCode
     *
     * @param  string $code
     * @return void
     */
    public function setOrderCode(string $code) :void;

    /**
     * getOrderCreationDate
     *
     * @return string
     */
    public function getOrderCreationDate() :string;
    /**
     * setOrderCreationDate
     *
     * @param  string $date
     * @return void
     */
    public function setOrderCreationDate(string $date) :void;

    /**
     * getOrderDeliveryDate
     *
     * @return string
     */
    public function getOrderDeliveryDate() :string;
    /**
     * setOrderDeliveryDate
     *
     * @param  string $date
     * @return void
     */
    public function setOrderDeliveryDate(string $date) :void;
}
