<?php

namespace App\Models;

use App\Enums\CategoryEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory, HasTranslations;

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
        'description'
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
    public function scopeActive(Builder $query)
    {
        $query->where('status', CategoryEnum::ACTIVE->value);
    }
}
