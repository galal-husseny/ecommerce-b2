<?php

namespace App\Models;

use App\Traits\HasEcryptedIds;
use App\Traits\EscapeUnicodeJson;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory , HasTranslations;
    use EscapeUnicodeJson;
    use HasTranslatableSlug;
    use HasEcryptedIds;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'city_id',
    ];

    /**
     * The attributes to be translated.
     *
     * @var array<int, string>
     */
    public $translatable = [
        'name',
        'slug'
    ];

    /**
     * addresses relation showing that a region has many addresses
     *
     * @return void
     */
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    /**
     * city relation showing that a region belongs to many city
     *
     * @return void
     */
    public function city(){
        return $this->belongsTo(City::class);
    }

    /**
     * products relation showing that spec belongs to many products
     *
     * @return void
     */
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('value')->withTimestamps()->using(ProductSpec::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage(false);
    }
}
