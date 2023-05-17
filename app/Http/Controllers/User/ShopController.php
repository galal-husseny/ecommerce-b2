<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * shop
     *
     * @return shop view
     */
    public function shop()
    {
        $products = Product::select('id' , 'name' , 'sale_price')->limit(16)->get();
        return view('user.shop' , compact('products'));
    }
}
