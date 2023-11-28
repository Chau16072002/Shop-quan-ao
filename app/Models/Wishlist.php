<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['id','product_id','customer_id'];
    function wishlists(){

        return $this->belongsTo(Product::class, 'product_id');
    }


}
