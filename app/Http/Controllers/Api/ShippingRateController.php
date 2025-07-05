<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShippingRate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ShippingRateController extends Controller
{
    /**
     * Get all active shipping rates
     */
    public function index(): JsonResponse
    {
        $rates = ShippingRate::active()
            ->select("state", "rate", "description")
            ->orderBy("state")
            ->get();

        return response()->json([
            "success" => true,
            "data" => $rates,
        ]);
    }

    /**
     * Get shipping rate for a specific state
     */
    public function getByState(string $state): JsonResponse
    {
        $rate = ShippingRate::where("state", $state)
            ->where("is_active", true)
            ->first();

        if (!$rate) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Shipping not available for this state",
                ],
                404
            );
        }

        return response()->json([
            "success" => true,
            "data" => [
                "state" => $rate->state,
                "rate" => $rate->rate,
                "description" => $rate->description,
            ],
        ]);
    }

    /**
     * Calculate shipping cost for an address
     */
    public function calculateShipping(Request $request): JsonResponse
    {
        $request->validate([
            "state" => "required|string",
            "cart_total" => "nullable|numeric|min:0", // Optional cart total for free shipping calculation
        ]);

        $state = $request->input("state");
        $cartTotal = $request->input("cart_total", 0);

        // Free shipping threshold (₦50,000)
        $freeShippingThreshold = 50000;

        // Check if cart qualifies for free shipping
        if ($cartTotal >= $freeShippingThreshold) {
            return response()->json([
                "success" => true,
                "data" => [
                    "state" => $state,
                    "shipping_cost" => 0,
                    "formatted_cost" => "FREE",
                    "is_free_shipping" => true,
                    "free_shipping_reason" => "Order qualifies for free shipping (₦50,000+)",
                ],
            ]);
        }

        $rate = ShippingRate::getRateForState($state);

        if ($rate === null) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Shipping not available for " . $state,
                ],
                404
            );
        }

        return response()->json([
            "success" => true,
            "data" => [
                "state" => $state,
                "shipping_cost" => $rate,
                "formatted_cost" => "₦" . number_format($rate, 2),
                "is_free_shipping" => false,
                "remaining_for_free_shipping" => max(0, $freeShippingThreshold - $cartTotal),
            ],
        ]);
    }

    /**
     * Get all Nigerian states with their shipping availability
     */
    public function getStatesWithAvailability(): JsonResponse
    {
        $allStates = ShippingRate::getNigerianStates();
        $activeRates = ShippingRate::getActiveRates();

        $statesWithAvailability = collect($allStates)->map(function (
            $state
        ) use ($activeRates) {
            return [
                "state" => $state,
                "available" => isset($activeRates[$state]),
                "rate" => $activeRates[$state] ?? null,
            ];
        });

        return response()->json([
            "success" => true,
            "data" => $statesWithAvailability,
        ]);
    }
}
