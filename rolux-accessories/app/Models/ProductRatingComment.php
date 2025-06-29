<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatingComment extends Model
{
    /** @use HasFactory<\Database\Factories\ProductRatingCommentFactory> */
    use HasFactory;

    protected $fillable = [
        'product_rating_id',
        'user_id',
        'parent_id',
        'comment',
    ];

    public function productRating()
    {
        return $this->belongsTo(ProductRating::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parent()
    {
        return $this->belongsTo(ProductRatingComment::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(ProductRatingComment::class, 'parent_id');
    }
}
