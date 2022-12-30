<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function favs($number1)
    {
        return $this->belongsToMany(User::class,'favs','product_id','user_id')->as('favs');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function carts()
    {
        return $this->belongsToMany(User::class,'carts','product_id','user_id')
        ->as('carts')->withPivot('quantity');
    }
}
