<?php
namespace App\Http\Services;

use App\Models\Spec;
use App\Models\Product;

class SpecService
{
    /**
     * @var array[int] $specIds
     */
    public array $specIds = [];

    /**
     * @var array[array] $productSpecs
     */
    public array $productSpecs = [];

    /**
     * saveNew
     *
     * @param  array $specs
     * @return array
     */
    public function saveSpecs(array $specs)
    {
        foreach ($specs as $spec) {
            $spec = Spec::create(['name' => $spec]);
            $this->specIds[] = $spec->id;
        }
        return $this;
    }

    /**
     * matchIds
     *
     * @param  int $productId
     * @param  marrayixed $specValues
     * @return array
     */
    public function matchIds(array $specValues)
    {
        for ($i=0; $i < count($this->specIds); $i++) {
            $this->productSpecs[$this->specIds[$i]] = ['value' => $specValues[$i]];
        }
        return $this;
    }

    public function saveProductSpecs(Product $product)
    {
        $product->specs()->attach($this->productSpecs);
    }
}
