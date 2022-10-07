<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'amount',
        'days',
        'status',
    ];

    /**
     * Relationships
     *
     */

    public function product()
    {
        return $this->hasMany(Product::class);
    }


     /**
     * All Accessor And Mutators
     *
     *
     */
    public function getAmountAttribute($amount)
    {
        return number_format($amount,2);
    }
}
