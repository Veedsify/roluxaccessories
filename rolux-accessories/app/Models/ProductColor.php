<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    /** @use HasFactory<\Database\Factories\ProductColorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_color_pivot', 'product_color_id', 'product_id');
    }
}
