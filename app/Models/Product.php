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
        return $this->sale_price  . ' ' . __('messages.user.shared.currency');
    }

       /**
     * purchase_price_with_currency
     *
     * @return string
     */
    public function purchase_price_with_currency() :string
    {
        return $this->purchase_price  . ' ' . __('messages.user.shared.currency');
    }

    /**
     * favs
     *
     * @return void
     */
    public function favs()
    {
        return $this->belongsToMany(User::class,'favs','product_id','user_id')->as('favs');
    }

    /**
     * reviews
     *
     * @return void
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * carts
     *
     * @return void
     */
    public function carts()
    {
        return $this->belongsToMany(User::class,'carts','product_id','user_id')->as('carts')->withPivot('quantity');
    }
}
