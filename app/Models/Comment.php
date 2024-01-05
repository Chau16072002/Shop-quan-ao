<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['id','customer_id','product_id','message']; 

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
