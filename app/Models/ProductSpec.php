<?php

namespace App\Models;

use App\Traits\EscapeUnicodeJson;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductSpec extends Pivot
{
    use HasTranslations;
    use EscapeUnicodeJson;

    /**
     * The attributes to be translated.
     *
     * @var array<int, string>
     */
    public $translatable = [
        'value',
    ];
}
