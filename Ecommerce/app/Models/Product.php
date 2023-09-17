<?php

namespace App\Models;


use App\Models\Color;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable=[
           'name',
           'slug',
           'brand',
           'small_description',
           'description',
           'original_price',
           'selling_price',
           'quantity',
           'trending',
           'status',
           'meta_title',
           'meta_keyword',
           'meta_description',
           'category_id'

    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productImages(){
        return $this->hasmany(ProductImage::class,'product_id','id');

    }
    public function productColors(){
        return $this->hasmany(ProductColor::class,'product_id','id');

    }

   
}
