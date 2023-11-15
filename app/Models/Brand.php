<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{

    protected $table = 'brands';
    protected $fillable = ['id', 'brand_name', 'brand_desc', 'brand_status'];

    public function ShowBrands(){
    //     $brands =  $this->brand->latest()->paginate(5);
    //    $brandes = DB::table('brands')->where('brand_status','1')>orderby('id','desc')->get();
    // return $this->hasMany(Category::class, 'id');
    }
}
