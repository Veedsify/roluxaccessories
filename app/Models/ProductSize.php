<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    /** @use HasFactory<\Database\Factories\ProductSizeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size_pivot', 'product_size_id', 'product_id');
    }
}
