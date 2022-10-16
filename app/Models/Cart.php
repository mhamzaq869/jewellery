<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $appends = ['total_price','total_checkout_price','shipping','discount','tax'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'size',
        'quantity',
        'price',
        'status',
    ];

    /**
     * Relationships
     *
     */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }


     /**
     * All Accessor And Mutators
     *
     *
     */
    public function getTotalPriceAttribute()
    {
        $total_price = $this->price + $this->tax;

        return $total_price;
    }
    public function getTotalCheckoutPriceAttribute()
    {
        $total_price = $this->price + $this->shipping  + $this->tax;

        return $total_price;
    }

    public function getShippingAttribute()
    {
        //Shipping Cost
        if($this->product->shipping != null){
            $total_price = $this->product->shipping;
        }else{
            $total_price = 0;
        }

        return $total_price;
    }

    public function getDiscountAttribute()
    {
        //Discount Cost
        if($this->product->discount != null){
            if($this->product->discount_type == 1){
                $total_price = $this->product->discount;
            }else{
                $total_price = $this->price*$this->product->discount/100;
            }
        }else{
            $total_price = 0;
        }

        return $total_price;
    }

    public function getTaxAttribute()
    {
        //tax Cost
        if($this->product->tax != null){
            if($this->product->tax_type == 1){
                $total_price = $this->product->tax;
            }else{
                $total_price = $this->price*$this->product->tax/100;
            }
        }else{
            $total_price = 0;
        }

        return $total_price;
    }
}
