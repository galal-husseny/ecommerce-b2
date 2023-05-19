<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductDetailsController extends Controller
{
    /**
     * product-details
     *
     * @return product-detail  view
     */
    public function detail(Product $product)
    {
        $product->load('specs', 'media', 'reviews.user:id,name','category');
        return view('user.product-detail', compact('product'));
    }
}
