<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,
     *  string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'company',
        'country',
        'city',
        'zipcode',
        'phone',
        'address_1',
        'address_2',
        'is_delivery',
        'is_shipping',
    ];


    /**
     * Relationships
     *
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
