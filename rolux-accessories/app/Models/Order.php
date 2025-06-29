<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'address_id',
        'total_amount',
        'payment_method',
        'tracking_number',
        'shipped_at',
        'delivered_at',
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
        return $this->belongsTo(Address::class, 'address_id');
    }
}
