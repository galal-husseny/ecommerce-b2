<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use App\Traits\EscapeUnicodeJson;
use App\Traits\HasEcryptedIds;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;
    use HasTranslatableSlug;
    use EscapeUnicodeJson;
    use HasEcryptedIds;

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
        'description',
        'slug'
    ];

    /**
     * sale_price_with_currency
     *
     * @return string
     */
    public function sale_price_with_currency($quantity = 1): string
    {
        return $this->sale_price * $quantity . ' ' . __('user.shared.currency');
    }

    /**
     * purchase_price_with_currency
     *
     * @return string
     */
    public function purchase_price_with_currency($quantity = 1): string
    {
        return $this->purchase_price * $quantity . ' ' . __('user.shared.currency');
    }

    /**
     * seller relation showing that a product belongs to one seller
     *
     * @return void
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * category relation showing that a product belongs to one category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * orders relation showing that a product has many orders
     *
     * @return void
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('price', 'quantity', 'discount', 'price_after_discount')->withTimestamps();
    }

    /**
     * specs relation showing that a product belongs to many specs
     *
     * @return void
     */
    public function specs(){
        return $this->belongsToMany(Spec::class)->withPivot('value')->withTimestamps()->using(ProductSpec::class);
    }

    /**
     * offers relation showing that a product belongs to many offers
     *
     * @return void
     */
    public function offers()
    {
        return $this->belongsToMany(Offer::class)->withPivot('discount', 'price_after_discount');
    }

    /**
     * favs relation showing that a product belongs to many favs
     *
     * @return void
     */
    public function favs()
    {
        return $this->belongsToMany(User::class, 'favs', 'product_id', 'user_id')->as('favs');
    }

    /**
     * carts relation showing that a product belongs to many carts
     *
     * @return void
     */
    public function carts()
    {
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id')->as('carts')->withPivot('quantity');
    }

    /**
     * wishlists relation showing that a product belongs to many wishlists
     *
     * @return void
     */
    public function wishlists()
    {
        return $this->belongsToMany(User::class, 'wishlists', 'product_id', 'user_id')->as('wishlists');
    }

    /**
     * reviews relation showing that a product has many reviews
     *
     * @return void
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage(false);
    }
}
