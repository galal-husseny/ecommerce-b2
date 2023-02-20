<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

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
