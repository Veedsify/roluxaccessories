<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'new',
        'active',
        'sale',
        'rate',
        'price',
        'originPrice',
        'slug',
        'sold',
        'quantity',
        'is_featured',
        'category_id',
        'action',
        'product_type_id',
        'brand_id',
        'collection_id',
    ];

    public function productSizes()
    {
        return $this->belongsToMany(ProductSize::class, 'product_size_pivot', 'product_id', 'product_size_id');
    }
    public function productColors()
    {
        return $this->belongsToMany(ProductColor::class, 'product_color_pivot', 'product_id', 'product_color_id');
    }
    public function productFeatures()
    {
        return $this->belongsToMany(ProductFeature::class, 'product_feature_pivot', 'product_id', 'product_feature_id');
    }
    public function productTypes()
    {
        return $this->belongsToMany(ProductType::class, 'product_type_pivot', 'product_id', 'product_type_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }
}
