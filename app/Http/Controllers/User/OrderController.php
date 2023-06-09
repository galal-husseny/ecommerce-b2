<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\PreOrder;
use App\Services\OrderCalcs;
use Illuminate\Http\Request;
use App\Entities\CartProducts;
use Illuminate\Support\Carbon;
use App\Entities\ProductEntity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\ApplyCouponService;
use App\Entities\ApplyCouponDataEntity;
use App\Events\OrderCreatedEvent;
use App\Http\Requests\Order\ChangeOrderStatusRequest;
use App\Http\Requests\Order\OrderRequest;
use App\Models\Admin;
use App\Models\WebsiteSetting;
use App\Services\PreprareOrderMailDataService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private User $user;
    private ?Coupon $coupon;
    private Address $address;
    private float $subTotal;
    private float $shippingValue;
    private float $orderTotalAfterDiscount;
    private float $discountPercent;
    private float $discountValue;

    public function recipent(OrderRequest $request)
    {
        $this->orderCalcs($request);
        $user = $this->user;
        $address = $this->address;
        $coupon = $this->coupon;
        $shippingValue = $this->shippingValue;
        $subTotal = $this->subTotal;
        $orderTotalAfterDiscount = $this->orderTotalAfterDiscount;
        $discountPercent = $this->discountPercent;
        $discountValue = $this->discountValue;

        PreOrder::create([
            'user_id' => $user->id,
            'address_id' => $address->id,
            'coupon' => $coupon?->code,
            'product_ids' => $user->carts->pluck('id')->toArray()
        ]);

        return view('user.order', compact(['user', 'coupon', 'address', 'subTotal', 'shippingValue', 'orderTotalAfterDiscount', 'discountPercent', 'discountValue']));

    }

    public function display(Request $request)
    {
        $preOrder = PreOrder::where('user_id', Auth::guard('web')->id())->where('status', 1)->first();
        if (! $preOrder) {
            return redirect()->route('cart');
        }
        $request->address = $preOrder->address_id;
        $request->user = $preOrder->user_id;
        $request->coupon = $preOrder->coupon;

        $this->orderCalcs($request);

        $user = $this->user;
        $address = $this->address;
        $coupon = $this->coupon;
        $shippingValue = $this->shippingValue;
        $subTotal = $this->subTotal;
        $orderTotalAfterDiscount = $this->orderTotalAfterDiscount;
        $discountPercent = $this->discountPercent;
        $discountValue = $this->discountValue;

        return view('user.order', compact(['user', 'coupon', 'address', 'subTotal', 'shippingValue', 'orderTotalAfterDiscount', 'discountPercent', 'discountValue']));
    }

    private function orderCalcs($request)
    {
        $coupon = Coupon::where('code', $request->coupon)->withCount('users')->first();
        $user = User::where('id', Auth::guard('web')->id())->with([
            'carts.media',
            'carts.category',
            'carts.specs',
            'coupons' =>  function ($query) use ($coupon) {
                if ($coupon) {
                    $query->where('coupon_id', $coupon->id);
                }
        }])->first();

        $address = Address::where('id', $request->address)->with('region.city')->first();
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
            $couponUsagePerUser = 0;
            foreach ($user->coupons as $dbCoupon) {
                $couponUsagePerUser = $dbCoupon->pivot->max_no_of_usage;
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
            }
        } else {
            $orderTotalAfterDiscount = $subTotal;
            $discountPercent = 0;
            $discountValue = 0;
        }

        $this->user = $user;
        $this->address = $address;
        $this->coupon = $coupon;
        $this->shippingValue = $shippingValue;
        $this->subTotal = $subTotal;
        $this->orderTotalAfterDiscount = $orderTotalAfterDiscount;
        $this->discountPercent = $discountPercent;
        $this->discountValue = $discountValue;
    }

    public function placeorder(OrderRequest $request)
    {

        $this->orderCalcs($request);

        $user = $this->user;
        $address = $this->address;
        $coupon = $this->coupon;
        $shippingValue = $this->shippingValue;
        $subTotal = $this->subTotal;
        $orderTotalAfterDiscount = $this->orderTotalAfterDiscount;
        $discountPercent = $this->discountPercent;
        $products = $user->load('carts.seller')->carts;
        $admin = Admin::first();
        $websiteSetting = WebsiteSetting::first();

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
        $finalPrice = $orderTotalAfterDiscount + $shippingValue;
        $orderCode = orderCode();
        try {
            DB::beginTransaction();
            $order = Order::create([
                'code' => $orderCode,
                'status' => 0,
                'total_price' => $subTotal,
                'final_price' => $finalPrice,
                'delivery_date' => Carbon::now()->addDays(7),
                'address_id' => $address->id,
                'coupon_id' => $coupon_id
            ]);
            $prepareMailData = new PreprareOrderMailDataService($user, $admin, $order, $products, $address, $websiteSetting, $coupon, $shippingValue, $discountPercent, $subTotal);
            OrderCreatedEvent::dispatch($prepareMailData->getUserEntity(), $prepareMailData->getAdminEntity(), $prepareMailData->getSellerEntity());
            foreach ($user->carts as $product) {
                $product->orders()->attach($product->id, [
                    'order_id' => $order->id,
                    'quantity' => $product->carts->quantity,
                    'price' => $product->sale_price,
                    'discount' => $productDiscount = ($discountPercent / 100) * $product->sale_price,
                    'price_after_discount' => ($product->sale_price - $productDiscount),
                ]);
            }
            $user->carts()->detach();

            PreOrder::where([['status' , 1], ['user_id', Auth::guard('web')->id()]])->update([
                'status' => 0
            ]);
            DB::commit();
            return redirect()->route('orderPlaced')->with('success', __('general.messages.orderCreated'));

        } catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('orderPlaced')->with('error', __('general.messages.error'));
        }
    }

    public function orderPlaced()
    {
        return view('user.orderCompleted');
    }

    public function index ()
    {
        $user = Auth::guard('web')->user();
        $user->load('addresses.orders');
        return view('user.all-orders', compact('user'));
    }

    public function show (User $user, Order $order)
    {
        $order->load('address.region.city', 'coupon');
        return view('user.order-details', compact(['user', 'order']));
    }

    public function update(ChangeOrderStatusRequest $request, Order $order)
    {
        if($request->status == 3){
            $order->update($request->validated());
            return redirect()->route('users.orders.index')->with('success', __('general.messages.updated'));
        }
    }

}
