<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;
    protected $table = 'categories';
    protected $fillable = ['id', 'parent_id', 'category_name', 'category_desc', 'category_status'];

    public function categoryChildrent(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
