<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['id','name','description','slider_status','image_path','image_name']; 
    //protected $guarded = [];
}
