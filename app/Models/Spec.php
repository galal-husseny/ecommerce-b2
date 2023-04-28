<?php

namespace App\Models;

use App\Traits\HasEcryptedIds;
use App\Traits\EscapeUnicodeJson;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spec extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasTranslatableSlug;
    use EscapeUnicodeJson;
    use HasEcryptedIds;



    protected $fillable = [
        'name',
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
