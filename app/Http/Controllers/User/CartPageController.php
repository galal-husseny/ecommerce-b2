<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class CartPageController extends Controller
{
    /**
     * cart
     *
     * @return cart view
     */
    public function cart()
    {
        return view('user.cart');
    }
}
