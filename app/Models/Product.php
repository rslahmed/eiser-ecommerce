<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    function brand(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

}
