<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'building_no',
        'floor_no',
        'flat_no',
        'type',
        'notes',
        'user_id',
        'region_id',
    ];

    /**
     * orders relation showing that address has many orders
     *
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }

    /**
     * user relation showing that an address belongs to one user only
     * @return void
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * region relation showing that an address belongs to one region only
     *
     * @return void
     */
    public function region(){
        return $this->belongsTo(Region::class);
    }
}
