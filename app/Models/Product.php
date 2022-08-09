<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'small_description',
        'original_price',
        'tax',
        'selling_price',
        'product_image',
        'qty',
        'status',
        'popular',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
