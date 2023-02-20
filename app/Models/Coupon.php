<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'max_usage_number_per_user',
        'discount',
        'max_discount_value',
        'code',
        'status',
        'max_usage_number',
        'min_order_value',
        'start_date',
        'end_date',
    ];

    /**
     * orders relation showing that coupon has many orders
     *
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }

    /**
     * users relation showing that coupon has many users
     *
     * @return void
     */
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('coupon_expired_at' , 'max_no_of_users_per_coupon');
    }
}
