<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'order_number',
        'billing_address',
        'shipping_address',
        'shippment',
        'tax',
        'total',
        'note',
        'payment_method',
        'payment_status',
        'status',
    ];


    /**
     * Relationships
     *
     */
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }


     /**
     * All Accessor And Mutators
     *
     *
     */
    public function getBillingAddressAttribute($billing_address)
    {
        if($billing_address != null){
            return json_decode($billing_address,true);
        }else{
            return array();
        }
    }

    public function getShippingAddressAttribute($shipping_address)
    {
        if($shipping_address != null){
            return json_decode($shipping_address,true);
        }else{
            return array();
        }
    }
}
