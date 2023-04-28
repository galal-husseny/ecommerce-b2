<?php
namespace App\Services;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;

class ReviewService
{
    public static function getProductReviews(Product $product)
    {
        return $product->with('reviews')->get();
    }
}
