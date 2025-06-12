<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatingImage extends Model
{
    /** @use HasFactory<\Database\Factories\ProductRatingImageFactory> */
    use HasFactory;

    protected $fillable = [
        'product_rating_id',
        'image_path',
    ];

    public function productRating()
    {
        return $this->belongsTo(ProductRating::class);
    }
}
