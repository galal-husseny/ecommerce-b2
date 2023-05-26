<?php

namespace App\Http\Controllers\Apis\User;

use App\Models\User;
use App\Services\OrderCalcs;
use App\Traits\ApiResponses;
use App\Entities\CartProducts;
use App\Entities\ProductEntity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartRequest;

class CartController extends Controller
{
    use ApiResponses;

    public function handle(CartRequest $request, CartProducts $cartProducts, OrderCalcs $orderCalcs)
    {
        $user = User::with(['wishlists','carts', 'addresses.region.city'])->withCount('carts', 'wishlists')->findOrFail($request->user_id);
        $shippingCost = OrderCalcs::shipping();
        if($user->carts->contains($request->product_id)) {
            if($request->has('quantity')) {
                if($request->quantity == 0) {
                    $user->carts()->detach($request->product_id);
                    $subTotal = $this->cartSubTotal($user->load('carts')->first()->carts);
                    return $this->data(['carts_count' => --$user->carts_count, 'subTotal' => $subTotal, 'shipping' => $shippingCost], 'deleted in cart successfully', 200);
                }
                $user->carts()->updateExistingPivot($request->product_id, ['quantity' => $request->quantity]);
                $subTotal = $this->cartSubTotal($user->load('carts')->first()->carts);
                return $this->data([
                    'carts_count' => $user->carts_count,
                    'quantity' => $request->quantity,
                    'subTotal' => $subTotal,
                    'shipping' => $shippingCost
                    ], 'edited in cart successfully', 200);
            } else {
                $user->carts()->updateExistingPivot($request->product_id, ['quantity' => DB::raw('quantity + 1')]);
            }
            return $this->data(['carts_count' => $user->carts_count, 'shipping' => $shippingCost], 'edited in cart successfully', 200);
        } else {
            $user->carts()->attach($request->product_id);
            $subTotal = $this->cartSubTotal($user->load('carts')->first()->carts);
            return $this->data(['carts_count' => ++$user->carts_count, 'shipping' => $shippingCost], 'added to cart successfully', 201);
        }
    }

    public function getSubTotal(CartRequest $request)
    {
        $user = User::with(['wishlists','carts', 'addresses.region.city'])->withCount('carts', 'wishlists')->findOrFail($request->user_id);
        $shiipingValue = OrderCalcs::shipping();
        if($user->carts->contains($request->product_id)) {
            $subTotal = $this->cartSubTotal($user->carts);
            return $this->data(['subTotal' => $subTotal, 'shipping' => $shiipingValue]);
        }
    }

    private function cartSubTotal($carts): float
    {
        $cartProducts = new CartProducts();
        foreach($carts as $product) {
            $cartProduct = new ProductEntity();
            $cartProduct->setPrice($product->sale_price);
            $cartProduct->setQuantity($product->carts->quantity);
            $cartProducts->addProduct($cartProduct);
        }
        return OrderCalcs::subTotal($cartProducts);
    }
}
