<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFeatureFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
        'is_featured',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_feature_pivot', 'product_feature_id', 'product_id');
    }
}
