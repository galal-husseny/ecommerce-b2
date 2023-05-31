<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Services\OrderCalcs;
use App\Entities\CartProducts;
use Illuminate\Support\Carbon;
use App\Entities\ProductEntity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\ApplyCouponService;
use App\Entities\ApplyCouponDataEntity;
use App\Http\Requests\Order\OrderRequest;

class OrderController extends Controller
{
    private $user;
    private $coupon;
    private $address;
    private $subTotal;
    private $shippingValue;
    private $orderTotalAfterDiscount;
    private $discountPercent;
    private $discountValue;

    public function recipent(OrderRequest $request)
    {
        $user = User::where('id', $request->user)->with(['carts.media', 'carts.category', 'carts.specs'])->first();
        $address = Address::where('id', $request->address)->with('region.city')->first();
        $coupon = Coupon::where('code', $request->coupon)->withCount('users')->first();
        $cartProducts = new CartProducts();
        $shippingValue = OrderCalcs::shipping();
        if (!$user) {
            return ['user' => 'user does not exist'];
        }
        foreach ($user->carts as $product) {
            $cartProduct = new ProductEntity();
            $cartProduct->setPrice($product->sale_price);
            $cartProduct->setQuantity($product->carts->quantity);
            $cartProducts->addProduct($cartProduct);
        }
        $subTotal = OrderCalcs::subTotal($cartProducts);
        if ($coupon) {
            $userCoupon = $user->with(['coupons' =>  function ($query) use ($coupon) {
                $query->where('coupon_id', $coupon->id);
            }])->first();
            $couponUsagePerUser = 0;
            foreach ($userCoupon->coupons as $dbCoupon) {
                if ($dbCoupon->code == $coupon->code) {
                    $couponUsagePerUser = $dbCoupon->pivot->max_no_of_usage;
                }
            }
            $maxUsageNumberPerUser = $coupon->max_usage_number_per_user;
            $orderCouponDiscountValue = $subTotal * (($coupon->discount / 100));
            $couponMaxDiscountValue = $coupon->max_discount_value;
            $couponStatus = $coupon->status;
            $couponMaxUsageNumber = $coupon->max_usage_number;
            $couponUsageCount = $coupon->users_count;
            $couponMinOrderValue = $coupon->min_order_value;
            $couponEndDate = $coupon->end_date;
            $couponStartDate = $coupon->start_at;
            $couponCalcs = ApplyCouponService::apply($maxUsageNumberPerUser, $couponUsagePerUser, $orderCouponDiscountValue, $couponMaxDiscountValue, $couponStatus, $couponMaxUsageNumber, $couponUsageCount, $couponMinOrderValue, $couponEndDate, $couponStartDate, $subTotal);
            if ($couponCalcs instanceof ApplyCouponDataEntity) {
                $orderTotalAfterDiscount = $couponCalcs->getOrderTotalAfterDiscount();
                $discountPercent = $couponCalcs->getDiscountPercent();
                $discountValue = $couponCalcs->getDiscountValue();
                $this->orderTotalAfterDiscount = $orderTotalAfterDiscount;
                $this->discountPercent = $discountPercent;
                $this->discountValue = $discountValue;
            }
        } else {
            $orderTotalAfterDiscount = $subTotal;
            $discountPercent = 0;
            $discountValue = 0;
            $this->setOrderTotalAfterDiscount($orderTotalAfterDiscount);
            $this->setDiscountPercent($discountPercent);
            $this->setDiscountValue($discountValue);
        }
        $this->setUser($user);
        $this->setCoupon($coupon);
        $this->setAddress($address);
        $this->setSubTotal($subTotal);
        $this->setShippingValue($shippingValue);
        session([
            'recipent' => [
                'user' => $user,
                'coupon' => $coupon,
                'address' => $address,
                'subTotal' => $subTotal,
                'shippingValue' => $shippingValue,
                'orderTotalAfterDiscount' => $this->getOrderTotalAfterDiscount(),
                'discountPercent' => $this->getDiscountPercent(),
                'discountValue' => $this->getDiscountValue()
            ]
        ]);
        return redirect()->route('displayRecipent');
    }


    public function display()
    {
        $recipent = session('recipent');
        $user = $recipent['user'];
        $coupon = $recipent['coupon'];
        $address = $recipent['address'];
        $subTotal = $recipent['subTotal'];
        $shippingValue = $recipent['shippingValue'];
        $orderTotalAfterDiscount = $recipent['orderTotalAfterDiscount'];
        $discountPercent = $recipent['discountPercent'];
        $discountValue = $recipent['discountValue'];

        return view('user.order', compact(['user', 'coupon', 'address', 'subTotal', 'shippingValue', 'orderTotalAfterDiscount', 'discountPercent', 'discountValue']));
    }

    public function placeorder()
    {
        $recipent = session('recipent');
        $user = $recipent['user'];
        $coupon = $recipent['coupon'];
        if ($coupon) {
            $coupon_id = $coupon->id;
            $userCoupon = $user->with(['coupons' =>  function ($query) use ($coupon) {
                $query->where('coupon_id', $coupon->id);
            }])->first();
            if (count($userCoupon->coupons) != 0) {
                $user->coupons()->updateExistingPivot($coupon->id, ['max_no_of_usage' => DB::raw('max_no_of_usage + 1')]);
            } else {
                $user->coupons()->attach($coupon->id, ['max_no_of_usage' => 1]);
            }
        } else {
            $coupon_id = null;
        }
        $address = $recipent['address'];
        $subTotal = $recipent['subTotal'];
        $shippingValue = $recipent['shippingValue'];
        $orderTotalAfterDiscount = $recipent['orderTotalAfterDiscount'];
        $discountValue = $recipent['discountValue'];
        $finalPrice = $orderTotalAfterDiscount + $shippingValue;
        $orderCode = orderCode();
        $order = Order::create([
            'code' => $orderCode,
            'status' => 0,
            'total_price' => $subTotal,
            'final_price' => $finalPrice,
            'delivery_date' => Carbon::now()->addDays(7),
            'address_id' => $address->id,
            'coupon_id' => $coupon_id
        ]);
        $productDiscount = $discountValue / count($user->carts);
        foreach ($user->carts as $product) {
            $product->load('orders');
            $product->orders()->attach($product->id, [
                'order_id' => $order->id,
                'quantity' => $product->carts->quantity,
                'price' => $product->sale_price,
                'discount' => $productDiscount,
                'price_after_discount' => ($product->sale_price - $productDiscount),
            ]);
        }
        return redirect()->route('orderPlaced')->with('success', __('general.messages.orderCreated'));
    }

    public function orderPlaced()
    {
        $data = session('recipent');
        $user = $data['user'];
        foreach ($user->carts as $product) {
            $user->carts()->detach($product->id);
        }
        session()->forget('recipent');
        return view('user.orderCompleted');
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of coupon
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Set the value of coupon
     *
     * @return  self
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of subTotal
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set the value of subTotal
     *
     * @return  self
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;

        return $this;
    }

    /**
     * Get the value of shippingValue
     */
    public function getShippingValue()
    {
        return $this->shippingValue;
    }

    /**
     * Set the value of shippingValue
     *
     * @return  self
     */
    public function setShippingValue($shippingValue)
    {
        $this->shippingValue = $shippingValue;

        return $this;
    }

    /**
     * Get the value of orderTotalAfterDiscount
     */
    public function getOrderTotalAfterDiscount()
    {
        return $this->orderTotalAfterDiscount;
    }

    /**
     * Set the value of orderTotalAfterDiscount
     *
     * @return  self
     */
    public function setOrderTotalAfterDiscount($orderTotalAfterDiscount)
    {
        $this->orderTotalAfterDiscount = $orderTotalAfterDiscount;

        return $this;
    }

    /**
     * Get the value of discountPercent
     */
    public function getDiscountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * Set the value of discountPercent
     *
     * @return  self
     */
    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;

        return $this;
    }

    /**
     * Get the value of discountValue
     */
    public function getDiscountValue()
    {
        return $this->discountValue;
    }

    /**
     * Set the value of discountValue
     *
     * @return  self
     */
    public function setDiscountValue($discountValue)
    {
        $this->discountValue = $discountValue;

        return $this;
    }
}
