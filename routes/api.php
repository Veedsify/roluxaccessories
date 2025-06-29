<?php

use App\Http\Controllers\Api\ShippingRateController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");

// Shipping Rate API Routes
Route::prefix("shipping")->group(function () {
    Route::get("/rates", [ShippingRateController::class, "index"]);
    Route::get("/rates/{state}", [ShippingRateController::class, "getByState"]);
    Route::post("/calculate", [
        ShippingRateController::class,
        "calculateShipping",
    ]);
    Route::get("/states", [
        ShippingRateController::class,
        "getStatesWithAvailability",
    ]);
});

// Auth API Routes
Route::prefix("auth")->group(function () {
    Route::post("/login", [
        App\Http\Controllers\Api\AuthController::class,
        "login",
    ]);
});

// Checkout API Routes
Route::prefix("checkout")->group(function () {
    Route::post("/place-order", [
        App\Http\Controllers\Api\CheckoutController::class,
        "placeOrder",
    ]);
});

// Search API Routes
Route::prefix("search")->group(function () {
    Route::get("/products", [SearchController::class, "searchProducts"]);
    Route::get("/suggestions", [SearchController::class, "searchSuggestions"]);
    Route::get("/filters", [SearchController::class, "getFilterOptions"]);
});
