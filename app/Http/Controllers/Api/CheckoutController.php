<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendOrderEmails;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShippingRate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Place a new order
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function placeOrder(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            // Validate request data
            $validator = Validator::make($request->all(), [
                "firstName" => "required|string|max:255",
                "lastName" => "required|string|max:255",
                "email" => "required|email|max:255",
                "phoneNumber" => "required|string|max:20",
                "country" => "required|string",
                "state" => "required|string",
                "city" => "required|string|max:255",
                "street" => "required|string|max:500",
                "postalCode" => "required|string|max:20",
                "cartItems" => "required|json",
                "subtotal" => "required|numeric|min:0",
                "shippingCost" => "required|numeric|min:0",
                "total" => "required|numeric|min:0",
                "paymentReceipt" =>
                "required|file|mimes:pdf,jpg,jpeg,png|max:5120",
                "note" => "nullable|string|max:1000",
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Validation failed",
                        "errors" => $validator->errors(),
                    ],
                    422
                );
            }

            // Parse cart items
            $cartItems = json_decode($request->cartItems, true);
            if (empty($cartItems)) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Cart is empty",
                    ],
                    400
                );
            }

            // Validate that the cart total and shipping calculations are correct
            $calculatedSubtotal = collect($cartItems)->sum(function ($item) {
                return $item["price"] * $item["quantity"];
            });

            // Check if the submitted subtotal matches calculated subtotal
            if (abs($calculatedSubtotal - $request->subtotal) > 0.01) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Cart total mismatch. Please refresh and try again.",
                    ],
                    400
                );
            }

            // Verify free shipping logic
            $freeShippingThreshold = 50000;
            $expectedShippingCost = 0;

            if ($calculatedSubtotal >= $freeShippingThreshold) {
                $expectedShippingCost = 0; // Free shipping
            } else {
                $expectedShippingCost = ShippingRate::getRateForState($request->state) ?? 0;
            }

            // Check if submitted shipping cost matches expected
            if (abs($expectedShippingCost - $request->shippingCost) > 0.01) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Shipping cost mismatch. Please recalculate shipping.",
                    ],
                    400
                );
            }

            DB::beginTransaction();

            // Create or get user
            $user = $this->createOrGetUser($request);

            // Upload payment receipt
            $receiptPath = $this->uploadPaymentReceipt($request);

            // Create shipping address
            $address = $this->createShippingAddress($request, $user);

            // Create order
            $order = $this->createOrder(
                $request,
                $user,
                $address,
                $receiptPath,
                $cartItems
            );

            // Create order details
            $this->createOrderDetails($order, $cartItems);

            // Update product sold and quantity
            foreach ($cartItems as $item) {
                $this->updateProductSold($item["id"], $item["quantity"]);
            }

            // Send email notifications
            SendOrderEmails::dispatch($order, "placed", "pending");

            DB::commit();

            return response()->json([
                "success" => true,
                "message" => "Order placed successfully",
                "data" => [
                    "order_number" => $order->order_number,
                    "total" => $order->getTotalAmountWithShipping(),
                    "order_id" => $order->id,
                ],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    "success" => false,
                    "message" => "Order placement failed. Please try again.",
                    "error" => $e->getMessage(),
                ],
                500
            );
        }
    }

    /**
     * Create or get existing user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    private function createOrGetUser(
        Request $request
    ): ?\Illuminate\Contracts\Auth\Authenticatable {
        if (Auth::check()) {
            return Auth::user();
        }

        // Check if user exists with this email
        $user = User::query()->where("email", $request->email)->first();

        if (!$user) {
            // Create guest user
            $user = User::query()->create([
                "name" => $request->firstName . " " . $request->lastName,
                "email" => $request->email,
                "password" => Hash::make("guest_" . time()),
                "is_guest" => true,
            ]);
        }

        return $user;
    }

    /**
     * Upload payment receipt file
     *
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    private function uploadPaymentReceipt(Request $request): string
    {
        if ($request->hasFile("paymentReceipt")) {
            $file = $request->file("paymentReceipt");

            // Validate file
            $allowedMimes = ["pdf", "jpg", "jpeg", "png"];
            $fileExtension = $file->getClientOriginalExtension();

            if (!in_array(strtolower($fileExtension), $allowedMimes)) {
                throw new \Exception(
                    "Invalid file type. Only PDF, JPG, JPEG, and PNG files are allowed."
                );
            }

            if ($file->getSize() > 5120 * 1024) {
                // 5MB
                throw new \Exception(
                    "File size too large. Maximum size is 5MB."
                );
            }

            $filename =
                "receipt_" . time() . "_" . uniqid() . "." . $fileExtension;

            return $file->storeAs("payment-receipts", $filename, "public");
        }

        throw new \Exception("Payment receipt is required.");
    }

    /**
     * Create shipping address
     *
     * @param Request $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @return Address
     */
    private function createShippingAddress(Request $request, $user): Address
    {
        return Address::query()->create([
            "user_id" => $user->id,
            "address_line1" => $request->street,
            "city" => $request->city,
            "state" => $request->state,
            "postal_code" => $request->postalCode,
            "country" => $request->country,
            "phone_number" => $request->phoneNumber,
            "is_billing" => true,
            "is_shipping" => true,
        ]);
    }

    /**
     * Create order
     *
     * @param Request $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param Address $address
     * @param string $receiptPath
     * @param array $cartItems
     * @return Order
     */
    private function createOrder(
        Request $request,
        $user,
        $address,
        string $receiptPath,
        array $cartItems
    ): Order {
        // Verify totals by recalculating
        $calculatedSubtotal = collect($cartItems)->sum(function ($item) {
            return $item["price"] * $item["quantity"];
        });

        // Free shipping threshold (₦50,000)
        $freeShippingThreshold = 50000;

        // Calculate shipping cost
        $calculatedShipping = 0;
        if ($calculatedSubtotal >= $freeShippingThreshold) {
            // Free shipping for orders ₦50,000 and above
            $calculatedShipping = 0;
        } else {
            // Use normal shipping rate
            $calculatedShipping = ShippingRate::getRateForState($request->state) ?? 0;
        }

        // Use calculated values for security
        return Order::query()->create([
            "user_id" => $user->id,
            "order_number" => "ORD-" . strtoupper(uniqid()),
            "status" => "pending",
            "address_id" => $address->id,
            "total_amount" => $calculatedSubtotal,
            "shipping_cost" => $calculatedShipping,
            "payment_method" => "bank_transfer",
            "payment_receipt" => $receiptPath,
            "notes" => $request->note,
        ]);
    }

    /**
     * Create order details
     *
     * @param Order $order
     * @param array $cartItems
     * @return void
     */
    private function createOrderDetails(Order $order, array $cartItems): void
    {
        foreach ($cartItems as $item) {
            // Verify product exists and get current price
            $product = Product::query()->find($item["id"]);

            if ($product) {
                OrderDetail::query()->create([
                    "order_id" => $order->id,
                    "product_id" => $product->id,
                    "product_name" => $product->name,
                    "price" => $item["price"], // Use the correct column name
                    "quantity" => $item["quantity"],
                    "total" => $item["price"] * $item["quantity"], // <-- Add this line
                    "product_size" => $item["size"]["name"] ?? null,
                    "product_color" => $item["color"]["name"] ?? null,
                    "product_image" => $item["image"] ?? null,
                ]);
            }
        }
    }

    private function updateProductSold(int $productId, int $quantity): void
    {
        $product = Product::query()->find($productId);
        if ($product) {
            $product->increment("sold", $quantity);
            $product->decrement("quantity", $quantity);
        }
    }
}
