<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "order_number",
        "status",
        "address_id",
        "total_amount",
        "shipping_cost",
        "payment_method",
        "payment_receipt",
        "notes",
        "tracking_number",
        "shipped_at",
        "delivered_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, "address_id");
    }

    /**
     * Calculate shipping cost for this order
     */
    public function calculateShippingCost(): float
    {
        if (!$this->shippingAddress) {
            return 0.0;
        }

        return ShippingRate::calculateShippingCost($this->shippingAddress);
    }

    /**
     * Get total order amount including shipping
     */
    public function getTotalAmountWithShipping(): float
    {
        $subtotal = $this->total_amount ?: 0.0;
        $shipping = $this->shipping_cost ?: $this->calculateShippingCost();

        return $subtotal + $shipping;
    }

    /**
     * Update shipping cost based on current address
     */
    public function updateShippingCost(): void
    {
        $this->shipping_cost = $this->calculateShippingCost();
        $this->save();
    }
}
