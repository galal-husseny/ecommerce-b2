<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasFactory , HasTranslations;

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
