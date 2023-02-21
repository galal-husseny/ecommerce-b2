<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sale_price',
        'quantity',
        'code',
        'status',
        'description',
        'purchase_price',
        'seller_id',
        'category_id'
    ];

    /**
     * The attributes to be translated.
     *
     * @var array<int, string>
     */
    public $translatable = [
        'name',
        'description'
    ];

    /**
     * sale_price_with_currency
     *
     * @return string
     */
    public function sale_price_with_currency() :string
    {
        return $this->sale_price  . ' ' . __('user.shared.currency');
    }

    /**
     * purchase_price_with_currency
     *
     * @return string
     */
    public function purchase_price_with_currency() :string
    {
        return $this->purchase_price  . ' ' . __('user.shared.currency');
    }

    /**
     * seller relation showing that a product belongs to one seller
     *
     * @return void
     */
    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    /**
     * category relation showing that a product belongs to one category
     *
     * @return void
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * orders relation showing that a product has many orders
     *
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class)->withPivot('price' , 'quantity' , 'quantity');
    }

    /**
     * specs relation showing that a product belongs to many specs
     *
     * @return void
     */
    public function specs(){
        return $this->belongsToMany(Spec::class)->withPivot('value');
    }

    /**
     * offers relation showing that a product belongs to many offers
     *
     * @return void
     */
    public function offers(){
        return $this->belongsToMany(Offer::class)->withPivot('discount' , 'price_after_discount');
    }

    /**
     * favs relation showing that a product belongs to many favs
     *
     * @return void
     */
    public function favs(){
        return $this->belongsToMany(User::class , 'favs' , 'product_id' , 'user_id')->as('favs');
    }

    /**
     * carts relation showing that a product belongs to many carts
     *
     * @return void
     */
    public function carts(){
        return $this->belongsToMany(User::class , 'carts' , 'product_id' , 'user_id')->as('carts')->withPivot('quantity');
    }

    /**
     * reviews relation showing that a product has many reviews
     *
     * @return void
     */
    public function reviews(){
        return $this->hasMany(Review::class );
    }
}
