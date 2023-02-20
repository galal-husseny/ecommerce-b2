<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'order_id',

    ];

    /**
     * orders relation showing that payment has many orders
     *
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
