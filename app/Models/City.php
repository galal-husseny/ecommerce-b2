<?php

namespace App\Models;

use App\Traits\HasEcryptedIds;
use App\Traits\EscapeUnicodeJson;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, HasTranslations;
    use EscapeUnicodeJson;
    use HasTranslatableSlug;
    use HasEcryptedIds;

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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'city_id'
    ];

    /**
     * regions relation showing that a city has many regions
     *
     * @return void
     */
    public function regions(){
        return $this->hasMany(Region::class);
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

    /**
     * scopeActive
     *
     * @param  query $query
     * @return active instance
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
