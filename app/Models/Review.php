<?php

namespace App\Models;

use App\Traits\EscapeUnicodeJson;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory , HasTranslations;
    use EscapeUnicodeJson;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rate',
        'comment',
        'product_id',
        'user_id',
    ];

    /**
     * The attributes to be translated.
     *
     * @var array<int, string>
     */
    public $translatable = [
        'comment',
    ];

    /**
     * product relation showing that a review belongs to one product
     *
     * @return void
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /**
     * user relation showing that a review to one user
     *
     * @return void
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
