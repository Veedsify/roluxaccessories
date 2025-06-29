<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariantFactory> */
    use HasFactory;

    protected $fillable = [
        'color',
        'colorCode',
        'colorImage',
        'image',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function getColorImageUrlAttribute()
    {
        return $this->colorImage ? asset('storage/' . $this->colorImage) : null;
    }
}
