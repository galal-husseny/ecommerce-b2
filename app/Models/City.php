<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory , HasTranslations;

    /**
     * The attributes to be translated.
     *
     * @var array<int, string>
     */
    public $translatable = [
        'name',
        'status'
    ];

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
     * regions relation showing that a city has many regions
     *
     * @return void
     */
    public function regions(){
        return $this->hasMany(Region::class);
    }
}
