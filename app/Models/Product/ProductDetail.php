<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    public $table = 'product_details';

    public $timestamps = false;

    public $fillable = [
    	'productId',
    	'colorId',
    	'sizeId',
    	'stock'
    ];

    public $hidden = [
    	'id',
    	'created',
    	'updated'
    ];
}