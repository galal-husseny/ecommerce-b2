<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
     * products relation showing that spec belongs to many products
     *
     * @return void
     */
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('value');
    }
}
