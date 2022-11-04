<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $appends = ['payment_method_image'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
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
    public function getPaymentMethodImageAttribute()
    {
        $int = DB::table('integrations')->where('name','Like','%'.$this->payment_method.'%')->first();
        if($int){
            return asset('backend/app-assets/images/icons/'.$int->image);
        }else{
            return '';
        }
    }
}
