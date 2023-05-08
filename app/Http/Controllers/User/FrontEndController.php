<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('user.shop', [
            'user' => Auth::guard('web'),
        ] , compact('products'));
    }

    /**
     * blog
     *
     * @return blog view
     */
    public function blog()
    {
        return view('user.blog', [
            'user' => Auth::guard('web'),
        ]);
    }

    /**
     * about
     *
     * @return about view
     */
    public function about()
    {
        return view('user.about', [
            'user' => Auth::guard('web'),
        ]);
    }

    /**
     * contact
     *
     * @return contact view
     */
    public function contact()
    {
        return view('user.contact', [
            'user' => Auth::guard('web'),
        ]);
    }

    /**
     * cart
     *
     * @return cart view
     */
    public function cart()
    {
        return view('user.cart', [
            'user' => Auth::guard('web'),
        ]);
    }

    /**
     * product-details
     *
     * @return product-detail  view
     */
    public function detail(Product $product)
    {
        $product->load('specs', 'media', 'reviews.user:id,name','category');
        // return $product;
        return view('user.product-detail', [
            'user' => Auth::guard('web'),
        ], compact('product'));
    }
}
