<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
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

    /**
     * blog
     *
     * @return blog view
     */
    public function blog()
    {
        return view('user.blog');
    }

    /**
     * about
     *
     * @return about view
     */
    public function about()
    {
        return view('user.about');
    }

    /**
     * contact
     *
     * @return contact view
     */
    public function contact()
    {
        return view('user.contact');
    }

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
