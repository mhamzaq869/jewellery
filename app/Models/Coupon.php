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
        'code',
        'type',
        'amount',
        'status',
    ];


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
