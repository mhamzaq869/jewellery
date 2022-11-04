<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
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



    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
