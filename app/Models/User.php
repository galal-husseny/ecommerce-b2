<?php

namespace App\Models;

use App\Traits\HasEcryptedIds;
use Laravel\Sanctum\HasApiTokens;

use App\Traits\SendEmailNotification;
use Illuminate\Notifications\Notifiable;
use App\Traits\SendResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SendEmailNotification, SendResetPasswordNotification;
    use HasEcryptedIds;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'verification_code',
        'email_verified_at',
        'phone_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * addresses relation showing that a user has many addresses
     *
     * @return void
     */
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    /**
     * favs relation showing that a user belongs to many products
     *
     * @return void
     */
    public function favs(){
        return $this->belongsToMany(Product::class , 'favs' , 'user_id' , 'product_id')->as('favs');
    }

    /**
     * carts relation showing that a user belongs to many products
     *
     * @return void
     */
    public function carts(){
        return $this->belongsToMany(Product::class , 'carts' , 'user_id' , 'product_id')->as('carts')->withPivot('quantity');
    }

    /**
     * wishlists relation showing that a user belongs to many wishlists
     *
     * @return void
     */
    public function wishlists(){
        return $this->belongsToMany(Product::class , 'wishlists' , 'user_id' , 'product_id')->as('wishlists');
    }

    /**
     * reviews relation showing that a user has many reviews
     *
     * @return void
     */
    public function reviews(){
        return $this->hasMany(Review::class );
    }

    /**
     * coupons relation showing that a user belongs to many coupons
     *
     * @return void
     */
    public function coupons(){
        return $this->belongsToMany(Coupon::class)->withPivot('max_no_of_usage')->withTimestamps();
    }
}
