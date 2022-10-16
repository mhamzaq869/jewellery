<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['photo','photo_2','short_description','total_price','admin_product_price','discount','discount_type','shipping','shipping_type','tax','tax_type','decode_size','decode_images'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'images',
        'brand_id',
        'category_id',
        'subcategory_id',
        'unit_price',
        'price',
        'discount_id',
        'quantity',
        'condition',
        'size',
        'description',
        'status',
        'is_featured',
        'shipping_id',
        'return',
        'return_days',
        'tax_id',
    ];


    /**
     * Relationships
     *
     */

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory()
    {
        return $this->hasOne(Category::class,'id','subcategory_id');
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function discount(){

        return $this->belongsTo(Discount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function related()
    {
        return $this->hasMany(Product::class,'subcategory_id','subcategory_id')->where('status',1)->orderBy('id','DESC')->limit(8);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
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
    public function getPriceAttribute($price)
    {
        return number_format($price,2);
    }

    public function getTotalPriceAttribute()
    {
        //Shipping Cost
        if($this->shipping != null){
            $total_price = $this->price + $this->shipping;
        }

        //Discount Cost
        if($this->discount != null){
            if($this->discount_type == 1){
                $total_price = $this->price - $this->discount;
            }else{
                $total_price = $this->price - ($this->price*$this->discount/100);
            }
        }


        //tax Cost
        if($this->tax != null){
            if($this->tax_type == 1){
                $total_price = $this->price + $this->tax;
            }else{
                $total_price = $this->price + ($this->price*$this->tax/100);
            }
        }

        return number_format($total_price,2);
    }


    public function getUnitPriceAttribute($unit_price)
    {
        return number_format($unit_price,2);
    }

    public function getDiscountAttribute()
    {
        if($this->discount_id != null || $this->discount_id != 0){
            $discount = DB::table('discounts')->where('id',$this->discount_id)->first();
            if($discount != null){
                if($discount->type == 1){
                    return number_format($discount->amount,2);
                }else{
                    return number_format($this->price*$discount->amount/100,2);
                }

            }else{
                return number_format(0,2);
            }
        }else{
            return number_format(0,2);
        }
    }

    public function getDiscountTypeAttribute()
    {
        if($this->discount_id != null || $this->discount_id != 0){
            $data = DB::table('discounts')->where('id',$this->discount_id)->first();
            if($data != null){
                return $data->type;
            }else{
                return null;
            }
        }else{
                return null;
        }
    }

    public function getShippingAttribute()
    {
        if($this->shipping_id != null || $this->shipping_id != 0){
            $shipping = DB::table('shippings')->where('id',$this->shipping_id)->first();
            if($shipping != null){
                return number_format($shipping->amount,2);
            }else{
                return number_format(0,2);
            }
        }else{
            return number_format(0,2);
        }
    }

    public function getShippingTypeAttribute()
    {
        if($this->shipping_id != null || $this->shipping_id != 0){
            $data = DB::table('shippings')->where('id',$this->shipping_id)->first();
            if($data != null){
                return $data->type;
            }else{
                return null;
            }
        }else{
                return null;
        }
    }

    public function getTaxAttribute()
    {
        if($this->tax_id != null || $this->tax_id != 0){
            $tax = DB::table('taxes')->where('id',$this->tax_id)->first();
            if($tax != null){
                return number_format($tax->amount,2);
            }else{
                return number_format(0,2);
            }
        }else{
            return number_format(0,2);
        }
    }

    public function getTaxTypeAttribute()
    {
        if($this->tax_id != null || $this->tax_id != 0){
            $data = DB::table('taxes')->where('id',$this->tax_id)->first();
            if($data != null){
                return $data->type;
            }else{
                return null;
            }
        }else{
                return null;
        }
    }

    public function getAdminProductPriceAttribute()
    {
        return number_format(DB::table('products')->where('id',$this->id)->first()->price,2);
    }

    public function getPhotoAttribute()
    {
        $images = json_decode($this->images);
        if(count($images) > 0){
            return $images[0];
        }else{
            return '';
        }
    }

    public function getPhoto2Attribute()
    {
        $images = json_decode($this->images);
        if(count($images) > 0){
            if(count($images) > 1){
                return $images[1];
            }else{
                return $images[0];
            }
        }else{
            return '';
        }
    }

    public function getShortDescriptionAttribute()
    {
        return substr($this->description,0,500).'...';
    }

    public function getDecodeSizeAttribute()
    {
        if($this->size != null){
            return json_decode($this->size);
        }else{
            return [];
        }
    }

    public function getDecodeImagesAttribute()
    {
        if($this->size != null){
            return json_decode($this->images);
        }else{
            return [];
        }
    }
}
