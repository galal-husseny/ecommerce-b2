<?php

namespace App\Models;

use App\Models\Order;
use App\Traits\HasEcryptedIds;
use App\Traits\EscapeUnicodeJson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    use EscapeUnicodeJson;
    use HasEcryptedIds;

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
        'start_at',
        'end_at',
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
        return $this->belongsToMany(User::class)->withPivot('max_no_of_usage')->withTimestamps();
    }

    /**
     * max_discount_value_with_currency
     *
     * @return string
     */
    public function max_discount_value_with_currency(): string
    {
        return $this->max_discount_value  . ' ' . __('user.shared.currency');
    }

    /**
     * min_order_value_with_currency
     *
     * @return string
     */
    public function min_order_value_with_currency(): string
    {
        return $this->min_order_value  . ' ' . __('user.shared.currency');
    }
}
