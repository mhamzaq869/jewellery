<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int> string>
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'slug',
        'read_at',
        'noti_type',
        'noti_data',
        'noti_title',
        'noti_desc',
        'noti_icon',
        'btn_class'
    ];
}
