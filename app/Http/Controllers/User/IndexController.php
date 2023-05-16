<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = Product::with(['media', 'wishlists'])->select('id', 'name', 'sale_price','description')->get();
        return view('user.dashboard', [
            'user' => $request->user('web'),
        ], compact('products'));
    }
}
