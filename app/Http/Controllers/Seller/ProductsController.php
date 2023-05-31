<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\ProductSpec;
use App\Models\Spec;
use App\Services\ReviewService;
use App\Services\SpecService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('category')->where('seller_id', Auth::guard('seller')->id())->get();
        return view('seller.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specs = Spec::all();
        $categories = Category::select(['id', 'name'])->active()->get();
        return view('seller.products.create', compact(['categories', 'specs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, SpecService $specService)
    {
        $code = productCode($request->name['en']);
        $product = Product::create(array_merge(
            $request->validated(),
            [
                'code' => $code,
                'seller_id' => Auth::guard('seller')->id(),
            ]
        ));
        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $product->addMedia($image)->toMediaCollection('product');
            }
        }
        $specsData = Spec::all();
        $specIds = SpecService::saveSpecs($request->spec_names, $specsData);
        $productSpecs = SpecService::matchIds($specIds, $request->spec_values);
        SpecService::saveProductSpecs($productSpecs, $product);
        return redirect()->route('sellers.products.index')->with('success', __('general.messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, string $slug = null)
    {
        $product->load('category:id,name', 'reviews.user:id,name', 'specs');
        return view('seller.products.show', compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select(['id', 'name'])->active()->get();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->has('image')) {
            $media = $product->getFirstMedia('product');
            if($media){
                $media->delete();
            }
            $product->addMediaFromRequest('image')->toMediaCollection('product');
        }
        $product->update($request->validated());
        return redirect()->route('sellers.products.index')->with('success', __('general.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->specs()->detach();
        $product->delete();
        return redirect()->back()->with('success', __('general.messages.deleted'));
    }
}
