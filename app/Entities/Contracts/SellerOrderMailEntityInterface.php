<?php
namespace App\Entities\Contracts;

use App\Entities\ProductEntityInterface;

interface SellerOrderMailEntityInterface extends OrderMailEntityInterface
{
    /**
     * getWebsiteName
     *
     * @return string
     */
    public function getWebsiteName() :string;
    /**
     * setWebsiteName
     *
     * @param  mixed $name
     * @return void
     */
    public function setWebsiteName(string $name) :void;
    /**
     * getWebsiteEmail
     *
     * @return string
     */
    public function getWebsiteEmail() :string;
    /**
     * setWebsiteEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setWebsiteEmail(string $email) :void;
    /**
     * getWebsiteAddress
     *
     * @return string
     */
    public function getWebsiteAddress() :string;
    /**
     * setWebsiteAddress
     *
     * @param  mixed $address
     * @return void
     */
    public function setWebsiteAddress(string $address) :void;

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
    public function setSellers(SellerOrderMailEntityInterface $seller) :void;

}
