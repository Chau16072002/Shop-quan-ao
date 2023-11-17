<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['id','image_path','product_id'];

    function item(){
        return $this->belongsTo(ProductImage::class, 'product_id');
    }
}
