<?php

namespace App\Models;

use App\Traits\HasEcryptedIds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;
    use HasEcryptedIds;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'building',
        'floor',
        'flat',
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

    /**
     * scopeActive
     *
     * @param  query $query
     * @return active instance
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    function getFullAddress() :string
    {
        return "{$this->region->city->name}, {$this->region->name}, {$this->street}, {$this->building}, Floor: {$this->floor}, Flat: {$this->flat}, Type: ({$this->type}), Notes: {$this->notes}";
    }
}
