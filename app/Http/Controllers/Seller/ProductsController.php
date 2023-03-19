<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Models\Category;
use App\Enums\CategoryEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\StoreProductRequest;
use Illuminate\Support\Facades\Crypt;

class ProductsController extends Controller
{
    public function __construct() {
        $this->middleware('decrypt.ids')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('seller_id', Auth::guard('seller')->id())->get();
        return view('seller.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->where('status', CategoryEnum::ACTIVE->value)->get();
        return view('seller.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $code = product_code($request->name['en']);
        $product = Product::create(array_merge($request->validated() ,
        [
            'code'=> $code,
            'seller_id' => Auth::guard('seller')->id(),
        ]));
        $product->addMediaFromRequest('image')->toMediaCollection('product');
        //add specs
        return redirect()->route('sellers.products.index')->with('success' , __('general.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, string $slug = null)
    {
        return view('seller.products.show', compact(['product' , 'category']) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, string $slug = null)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = [
            "en" => 'hello',
            'ar' => 'آهلا'
        ];
        $product->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', __('general.messages.deleted'));
    }


}
