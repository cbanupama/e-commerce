<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','name','slug','price', 'discount_percentage', 'image','size','color'
    ];
}
