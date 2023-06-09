<?php
namespace App\Entities\Contracts;

use App\Entities\ProductEntityInterface;

interface AdminOrderMailEntityInterface extends OrderMailEntityInterface
{
    /**
     * getSellerName
     *
     * @return string
     */
    public function getSellerName() :string;
    /**
     * setSellerName
     *
     * @param  mixed $name
     * @return void
     */
    public function setSellerName(string $name) :void;
    /**
     * getSellerShopName
     *
     * @return string
     */
    public function getSellerShopName() :string;
    /**
     * setSellerShopName
     *
     * @param  mixed $name
     * @return void
     */
    public function setSellerShopName(string $name) :void;
    /**
     * getSellerEmail
     *
     * @return string
     */
    public function getSellerEmail() :string;
    /**
     * setSellerEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setSellerEmail(string $email) :void;
    /**
     * getSellePhone
     *
     * @return string
     */
    public function getSellerPhone() :string;
    /**
     * setSellerPhone
     *
     * @param  mixed $address
     * @return void
     */
    public function setSellerPhone(string $address) :void;

    /**
     * getSellers
     *
     * @return string
     */
    public function getSellers() :array;

    /**
     * setSeller
     *
     * @param  self $seller
     * @return void
     */
    public function setSellers(AdminOrderMailEntityInterface $seller) :void;

    /**
     * getAdminEmail
     *
     * @return string
     */
    public function getAdminEmail() :string;
    /**
     * setAdminEmail
     *
     * @param  mixed $name
     * @return void
     */
    public function setAdminEmail(string $email) :void;
}
