<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spec extends Model
{
    use HasFactory;
    use HasTranslations;

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
    ];

    /**
     * products relation showing that spec belongs to many products
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('value')->withTimestamps()->using(ProductSpec::class);
    }
}
