<?php

namespace App\Models;

use App\Enums\CategoryEnum;
use App\Traits\HasEcryptedIds;
use App\Traits\EscapeUnicodeJson;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Sluggable\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasTranslations;
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
     * products relation showing that category has many products
     *
     * @return void
     */
    public function products(){
        return $this->hasMany(Product::class);
    }

    /**
     * scopeActive
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeActive(Builder $query) :void
    {
        $query->where('status', CategoryEnum::ACTIVE->value);
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
