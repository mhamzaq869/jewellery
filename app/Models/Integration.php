<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'app_id',
        'client_id',
        'secret_key',
        'cluster',
        'type',
        'host',
        'username',
        'password',
        'encryption',
        'port',
        'status',
    ];

}
