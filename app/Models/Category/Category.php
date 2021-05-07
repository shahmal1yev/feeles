<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    public $translatedAttributes = ['name'];

    public $timestamps = false;

    public $fillable = [
    	'az',
    	'ru',
    	'en',
    ];

    public $hidden = ['created', 'updated'];
}