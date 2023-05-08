<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartRequest;
use App\Models\Product;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use ApiResponses;

    public function add(CartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $product->carts()->attach($request->user_id);
        return $this->success('added to cart successfully');
    }
}
