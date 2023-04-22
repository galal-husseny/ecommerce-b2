<?php
namespace App\Services;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;

class ReviewService
{
    public static function getProductReviews(Product $product)
    {
        $reviews = Review::where('product_id' , $product->id)->get(['user_id' , 'comment' , 'rate']);
        foreach ($reviews as $index => $review){
            $review->load('user');
            $reviewsFinal []=[
                'user' => $review->user->name,
                'comment' => $review->comment,
                'rate' => $review->rate
            ];
        }
        return ($reviewsFinal);
    }
}
