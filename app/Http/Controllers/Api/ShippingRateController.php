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
        ]);

        $state = $request->input("state");
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
