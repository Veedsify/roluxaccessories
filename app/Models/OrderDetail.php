<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;

    protected $fillable = [
        "order_id",
        "product_id",
        "variant_id",
        "product_details",
        "quantity",
        "price",
        "total",
        "status",
        "tracking_number",
        "product_name",
        "product_price",
        "product_size",
        "product_color",
        "product_image",
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, "variant_id");
    }
}
