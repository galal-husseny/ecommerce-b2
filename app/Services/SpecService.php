<?php
namespace App\Services;

use App\Models\Spec;
use App\Models\Product;
use App\Models\ProductSpec;

class SpecService
{
    /**
     * saveSpecs
     *
     * @param  array $specs
     * @return array $specIds
     */
    public static function saveSpecs (array $specs):array
    {
        foreach ($specs as $spec) {
            $spec = Spec::create(['name'=>$spec]);
            $specIds[]=$spec->id;
        }
        return $specIds;
    }

    /**
     * matchIds
     *
     * @param  array $specIds
     * @param  array $specValues
     * @return array $productSpecs
     */
    public static function matchIds (array $specIds, array $specValues):array
    {
        for($i=0 ; $i<count($specIds) ; $i++){
            $productSpecs[$specIds[$i]] = ['value'=>$specValues[$i]];
        }
        return $productSpecs;
    }

    /**
     * saveProductSpecs
     *
     * @param  array $productSpecs
     * @param  array $product
     * @return void
     */
    public static function saveProductSpecs (array $productSpecs , Product $product)
    {
        $product->specs()->attach($productSpecs);
    }

    public static function getSpecsIds(Product $product):array
    {
        $productSpecs = ProductSpec::where('product_id' , $product->id)->get();
        foreach ($productSpecs as $productSpec){
            $specIds[] = $productSpec->spec_id;
        }
        return $specIds;
    }

    public static function getSpecsNames (array $specIds):array
    {
        $specnames []= Spec::all()->only($specIds);
        foreach ($specnames[0] as $key=>$specname){
            $specNames[] = $specname->name;
        }
        return $specNames;
    }

    public static function getSpecsValues(Product $product)
    {
        $productSpecs = ProductSpec::where('product_id' , $product->id)->get();
        foreach ($productSpecs as $productSpec){
            $specValues[] = $productSpec->value;
        }
        return $specValues;
    }

    public static function generateSpecs(array $specNames , array $specValues)
    {
        $specs = [];
        for ($i=0 ; $i< count($specNames) ; $i++){
            $specs[$specNames[$i]] = $specValues[$i];
        }
        return $specs;
    }
}
