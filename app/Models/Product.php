<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id', 'category_id', 'brand_id', 'product_name', 'product_desc','product_content','product_price','product_image','product_status'];
    function images(){
        return $this->hasMany(ProductImage::class,'product_id');
        return $this->belongsTo(ProductImage::class, 'product_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    
}
