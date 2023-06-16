<?php

namespace App\Services;

use App\Entities\UserOrderMailEntity;
use App\Entities\AdminOrderMailEntity;
use App\Entities\SellerOrderMailEntity;
use App\Entities\Contracts\UserOrderMailEntityInterface;
use App\Entities\Contracts\AdminOrderMailEntityInterface;
use App\Entities\Contracts\SellerOrderMailEntityInterface;
use App\Entities\ProductEntity;
use App\Entities\ProductEntityInterface;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Database\Eloquent\Collection;

class PreprareOrderMailDataService
{
    private UserOrderMailEntityInterface $userEntity;
    private AdminOrderMailEntityInterface $adminEntity;
    private SellerOrderMailEntityInterface $sellerEntity;
    private ProductEntityInterface $productEntity;

    public function __construct(
        private User $user,
        private Admin $admin,
        private Order $order,
        private Collection $cart,
        private Address $address,
        private WebsiteSetting $webisteSetting,
        private ?string $coupon,
        private float $shipping,
        private float $discount,
        private float $subTotal // total berfore adding the shipping value or subsctacting the discount value
        ) {
        $this->userEntity = new UserOrderMailEntity;
        $this->adminEntity = new AdminOrderMailEntity;
        $this->sellerEntity = new SellerOrderMailEntity;
        $this->productEntity = new ProductEntity;
        $this->prepareDate();
    }

    /**
     * prepareDate
     *
     * @return void
     */
    private function prepareDate()
    {
        # common

        // private string $userName;
        $this->userEntity->setUserName($this->user->name);
        $this->sellerEntity->setUserName($this->user->name);
        $this->adminEntity->setUserName($this->user->name);
        // private string $userEmail;
        $this->userEntity->setUserEmail($this->user->email);
        $this->sellerEntity->setUserEmail($this->user->email);
        $this->adminEntity->setUserEmail($this->user->email);
        // private string $userAddress;
        $this->userEntity->setUserAddress($this->address->getFullAddress());
        $this->sellerEntity->setUserAddress($this->address->getFullAddress());
        $this->adminEntity->setUserAddress($this->address->getFullAddress());
        // private string $coupon;
        $this->userEntity->setCoupon($this->coupon);
        $this->sellerEntity->setCoupon($this->coupon);
        $this->adminEntity->setCoupon($this->coupon);
        // private string $orderCode;
        $this->userEntity->setOrderCode($this->order->code);
        $this->sellerEntity->setOrderCode($this->order->code);
        $this->adminEntity->setOrderCode($this->order->code);
        // private string $orderCreationDate;
        $this->userEntity->setOrderCreationDate($this->order->created_at);
        $this->sellerEntity->setOrderCreationDate($this->order->created_at);
        $this->adminEntity->setOrderCreationDate($this->order->created_at);
        // private string $orderDeliveryDate;
        $this->userEntity->setOrderDeliveryDate($this->order->delivery_date);
        $this->sellerEntity->setOrderDeliveryDate($this->order->delivery_date);
        $this->adminEntity->setOrderDeliveryDate($this->order->delivery_date);
        // private float $subTotal;
        $this->userEntity->setSubTotal($this->subTotal);
        $this->sellerEntity->setSubTotal($this->subTotal);
        $this->adminEntity->setSubTotal($this->subTotal);
        // private float $discount;
        $this->userEntity->setDiscount($this->discount);
        $this->sellerEntity->setDiscount($this->discount);
        $this->adminEntity->setDiscount($this->discount);
        // private float $shipping;
        $this->userEntity->setShipping($this->shipping);
        $this->sellerEntity->setShipping($this->shipping);
        $this->adminEntity->setShipping($this->shipping);
        // private float $total;
        $total = $this->subTotal + $this->shipping - ($this->discount * $this->subTotal);
        $this->userEntity->setTotal($total);
        $this->sellerEntity->setTotal($total);
        $this->adminEntity->setTotal($total);


        foreach ($this->cart as $cartProduct) {
            $adminEntity = clone $this->adminEntity;
            $productEntity = clone $this->productEntity;
            $sellerEntity = clone $this->sellerEntity;

            $productEntity->setName($cartProduct->name);
            $productEntity->setPrice($cartProduct->sale_price);
            $productEntity->setQuantity($cartProduct->carts->quantity);
            $productEntity->setStock($cartProduct->quantity);
            $productEntity->setCode($cartProduct->code);
            $sellerEntity->setSubTotal($cartProduct->sale_price * $cartProduct->quantity);
            $sellerEntity->setTotal($sellerEntity->getSubTotal() + $this->shipping);

            // private array $products;
            $sellerEntity->setProducts($productEntity);
            $adminEntity->setProducts($productEntity);
            $this->userEntity->setProducts($productEntity);

            // admin
            // private string $sellerName;
            $adminEntity->setSellerName($cartProduct->seller->name);
            $sellerEntity->setSellerName($cartProduct->seller->name);
            // private string $sellerShopName;
            $adminEntity->setSellerShopName($cartProduct->seller->shop_name);
            $sellerEntity->setSellerShopName($cartProduct->seller->shop_name);

            // private string $sellerEmail;
            $adminEntity->setSellerEmail($cartProduct->seller->email);
            $sellerEntity->setSellerEmail($cartProduct->seller->email);

            // private string $sellerPhone;
            $adminEntity->setSellerPhone($cartProduct->seller->phone);
            $sellerEntity->setSellerPhone($cartProduct->seller->phone);

            // $exist = false;
            // foreach($this->adminEntity->getSellers() as $seller) {
            //     if ($seller->getSellerEmail() === $cartProduct->seller->email) {
            //         $exist = true;
            //     }
            // }
            // if (! $exist) {
                $this->adminEntity->setSellers($adminEntity);
                $this->sellerEntity->setSellers($sellerEntity);
            // } else {

            // }
            // unique sellers
        }

        // private string $adminEmail;
        $this->adminEntity->setAdminEmail($this->admin->email);
        # user/seller
        // private string $webisteName;
        $this->userEntity->setWebsiteName($this->webisteSetting->name);
        $this->sellerEntity->setWebsiteName($this->webisteSetting->name);
        // private string $webisteAddress;
        $this->userEntity->setWebsiteAddress($this->webisteSetting->address);
        $this->sellerEntity->setWebsiteAddress($this->webisteSetting->address);
        // private string $webisteEmail;
        $this->userEntity->setWebsiteEmail($this->webisteSetting->email);
        $this->sellerEntity->setWebsiteEmail($this->webisteSetting->email);

    }


    /**
     * Get the value of userEntity
     */
    public function getUserEntity()
    {
        return $this->userEntity;
    }

    /**
     * Get the value of adminEntity
     */
    public function getAdminEntity()
    {
        return $this->adminEntity;
    }

    /**
     * Get the value of sellerEntity
     */
    public function getSellerEntity()
    {
        return $this->sellerEntity;
    }
}
