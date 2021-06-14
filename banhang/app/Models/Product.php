<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded=[];
    public function productimages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id')->withTimestamps();
    }
    public function categorys(){
        return $this->belongsTo(Category::class,'cate_id');
    }
    
}