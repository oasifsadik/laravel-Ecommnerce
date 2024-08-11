<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'product_slug',
        'product_name',
        'product_quantity',
        'buying_price',
        'selling_price',
        'discount_price',
        'discount_type',
        'discount_value',
        'color',
        'size',
        'action',
        'description',
        'thumbnail',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
}
