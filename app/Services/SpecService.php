<?php
namespace App\Services;

use App\Models\Product;
use App\Models\Spec;

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
}
