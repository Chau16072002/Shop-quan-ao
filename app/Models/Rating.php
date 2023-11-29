<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['id','product_id','rating'];
    protected $table = 'ratings';
    function ProductRating(){

        return $this->belongsTo(Product::class, 'product_id');
    }
}
