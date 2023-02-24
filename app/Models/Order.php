<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status',
        'total_price',
        'final_price',
        'delivery_date',
        'address_id',
        'coupon_id'
    ];

    /**
     * address relation showing that order belong to one address
     *
     * @return void
     */
    public function address(){
        return $this->belongsTo(Address::class);
    }

    /**
     * payment relation showing that order belong to one payment
     *
     * @return void
     */
    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    /**
     * coupon relation showing that order belong to one coupon
     *
     * @return void
     */
    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    /**
     * products relation showing that order belong to many products
     *
     * @return void
     */
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('price' , 'quantity' , 'quantity');
    }
}
