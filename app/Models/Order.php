<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'country',
        'pincode',
        'o_status',
        'message',
        'track_no',
    ];
}
