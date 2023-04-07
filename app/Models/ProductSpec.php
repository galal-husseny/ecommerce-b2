<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Translatable\HasTranslations;

class ProductSpec extends Pivot
{
    use HasTranslations;

    /**
     * The attributes to be translated.
     *
     * @var array<int, string>
     */
    public $translatable = [
        'value',
    ];
}
