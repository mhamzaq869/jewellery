<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'decode_email',
        'decode_contact',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'favicon',
        'logo',
        'email',
        'contact',
        'about',
        'facebook',
        'instagram',
        'twitter',
        'medium',
    ];


     /**
     * All Accessor And Mutators
     *
     *
     */

    public function getDecodeEmailAttribute()
    {
        if($this->email != null){
            return json_decode($this->email);
        }else{
            return [];
        }
    }

    public function getDecodeContactAttribute()
    {
        if($this->contact != null){
            return json_decode($this->contact);
        }else{
            return [];
        }
    }
}
