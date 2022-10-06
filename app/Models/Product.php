<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['photo','admin_product_price','decode_size','decode_images'];

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
        'category_id',
        'subcategory_id',
        'unit_price',
        'price',
        'discount',
        'quantity',
        'condition',
        'size',
        'description',
        'status',
        'is_featured',
        'shipping',
        'shipping_days',
        'return',
        'return_days',
        'tax',
        'tax_type',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
        return $this->hasOne(Category::class,'id','subcategory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function getUnitPriceAttribute($unit_price)
    {
        return number_format($unit_price,2);
    }

    public function getDiscountAttribute($discount)
    {
        return number_format($discount,2);
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
