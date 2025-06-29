<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    /** @use HasFactory<\Database\Factories\ShippingRateFactory> */
    use HasFactory;

    protected $fillable = ["state", "rate", "is_active", "description"];

    protected $casts = [
        "rate" => "decimal:2",
        "is_active" => "boolean",
    ];

    /**
     * Get all Nigerian states
     */
    public static function getNigerianStates(): array
    {
        return [
            "Abia",
            "Adamawa",
            "Akwa Ibom",
            "Anambra",
            "Bauchi",
            "Bayelsa",
            "Benue",
            "Borno",
            "Cross River",
            "Delta",
            "Ebonyi",
            "Edo",
            "Ekiti",
            "Enugu",
            "FCT",
            "Gombe",
            "Imo",
            "Jigawa",
            "Kaduna",
            "Kano",
            "Katsina",
            "Kebbi",
            "Kogi",
            "Kwara",
            "Lagos",
            "Nasarawa",
            "Niger",
            "Ogun",
            "Ondo",
            "Osun",
            "Oyo",
            "Plateau",
            "Rivers",
            "Sokoto",
            "Taraba",
            "Yobe",
            "Zamfara",
        ];
    }

    /**
     * Get shipping rate for a specific state
     */
    public static function getRateForState(string $state): ?float
    {
        $shippingRate = self::where("state", $state)
            ->where("is_active", true)
            ->first();

        return $shippingRate ? $shippingRate->rate : null;
    }

    /**
     * Scope to only active rates
     */
    public function scopeActive($query)
    {
        return $query->where("is_active", true);
    }

    /**
     * Calculate shipping cost for an order based on shipping address
     */
    public static function calculateShippingCost($address): float
    {
        if (!$address || !$address->state) {
            return 0.0;
        }

        $rate = self::getRateForState($address->state);
        return $rate ?? 0.0;
    }

    /**
     * Get all active shipping rates
     */
    public static function getActiveRates(): array
    {
        return self::where("is_active", true)
            ->pluck("rate", "state")
            ->toArray();
    }

    /**
     * Check if shipping is available for a state
     */
    public static function isShippingAvailable(string $state): bool
    {
        return self::where("state", $state)->where("is_active", true)->exists();
    }
}
