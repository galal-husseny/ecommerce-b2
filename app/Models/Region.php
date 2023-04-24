<?php

namespace App\Models;

use App\Traits\HasEcryptedIds;
use App\Traits\EscapeUnicodeJson;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory , HasTranslations;
    use EscapeUnicodeJson;
    use HasEcryptedIds;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'city_id',
    ];

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
     * addresses relation showing that a region has many addresses
     *
     * @return void
     */
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    /**
     * city relation showing that a region belongs to many city
     *
     * @return void
     */
    public function city(){
        return $this->belongsTo(City::class);
    }
}
