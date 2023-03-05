<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Models\Category;
use App\Enums\CategoryEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
        return view('seller.index');
    }

    public function edittest(){
        $product = Product::where('seller_id', Auth::guard('seller')->id())->where('id' , 1)->get();
        $categories = Category::select(['id', 'name'])->where('status', CategoryEnum::ACTIVE->value)->get();

        return view('seller.products.edit' , compact('product' , 'categories'));
    }

    public function showtest(){
        $product = Product::where('seller_id', Auth::guard('seller')->id())->where('id' , 8)->get();
        $category = Category::where('id', $product[0]->category_id)->get();

        return view('seller.products.show' , compact('product' , 'category'));
    }
}
