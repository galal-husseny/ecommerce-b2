<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\ApplyCouponRequest;
use App\Http\Requests\Cart\CartRequest;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    use ApiResponses;

    public function handle(CartRequest $request)
    {
        $user = User::withCount('carts')->findOrFail($request->user_id);
        if($user->carts->contains($request->product_id)){
            if($request->has('quantity')){
                if($request->quantity == 0){
                    $user->carts()->detach($request->product_id);
                    return $this->data(['carts_count' => --$user->carts_count] ,'deleted in cart successfully', 200);

                }
            $user->carts()->updateExistingPivot($request->product_id, ['quantity' => $request->quantity]);
            }else{
                $user->carts()->updateExistingPivot($request->product_id, ['quantity' => DB::raw('quantity + 1')]);
            }
            return $this->data(['carts_count' => $user->carts_count] ,'edited in cart successfully', 200);
        }else{
            $user->carts()->attach($request->product_id);
            return $this->data(['carts_count' => ++$user->carts_count], 'added to cart successfully', 201);
        }
    }

    public function applyCoupon(ApplyCouponRequest $request)
    {
        $coupon =Coupon::withCount('users')->where('code', $request->couponCode)->first();
        $user = User::with('coupons')->withCount('coupons')->findOrFail($request->user_id);
        if($user){
            if(! $coupon){
                return $this->success('Coupon not found');
            }
            if($coupon->status ==0){
                return $this->success('This coupon is not active');
            }else if($coupon->max_usage_number <= $coupon->users_count){
                return $this->success('This Coupon reached max number of usage');
            }else if($coupon->max_usage_number_per_user <= $user->coupons_count){
                return $this->success('This user can not use this coupon anymore');
            }else if($request->orderTotal < $coupon->min_order_value){
                return $this->success('The order value is lower than coupon min vaue to be applied');
            }else if($request->couponApplyDate > $coupon->end_date){
                return $this->success('This coupon is no longer valid');
            }
            if($request->orderTotal * (1-($coupon->discount/100)) > $coupon->max_discount_value){
                $orderTotal = $request->orderTotal - $coupon->max_discount_value;

            }else{
                $orderTotal = $request->orderTotal * (1-($coupon->discount/100));
            }
            return $this->data([$orderTotal]);
        }
    }
}
