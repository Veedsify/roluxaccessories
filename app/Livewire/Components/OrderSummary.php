<?php

namespace App\Livewire\Components;

use App\Models\ShippingRate;
use Livewire\Component;

class OrderSummary extends Component
{
    // Order data
    public $cartItems = [];
    public $subtotal = 0;
    public $shippingCost = 0;
    public $total = 0;
    public $state = "";

    protected $listeners = [
        "cartDataReceived" => "receiveCartData",
        "shippingStateUpdated" => "updateShippingState",
        "requestCartData" => "requestCartDataFromJs",
        "shippingCalculated" => "updateShippingCost",
    ];

    public function mount($state = "")
    {
        $this->state = $state;
        $this->calculateShipping();
    }

    public function receiveCartData($cartData)
    {
        if (is_array($cartData) && !empty($cartData)) {
            $this->cartItems = $cartData;
            $this->calculateTotals();
        }
    }

    public function requestCartDataFromJs()
    {
        // This method can be called by JavaScript to trigger cart data refresh
        $this->dispatch("getCartDataFromStorage");
    }

    public function updateShippingState($state)
    {
        if ($state) {
            $this->state = $state;
            $this->calculateShipping();
        }
    }

    public function calculateShipping()
    {
        if ($this->state) {
            $this->shippingCost =
                ShippingRate::getRateForState($this->state) ?? 0;
            $this->calculateTotals();
        } else {
            $this->shippingCost = 0;
            $this->calculateTotals();
        }
    }

    public function updateShippingCost($cost)
    {
        if (is_numeric($cost)) {
            $this->shippingCost = $cost;
            $this->calculateTotals();
        }
    }

    private function calculateTotals()
    {
        $this->subtotal = collect($this->cartItems)->sum(function ($item) {
            return $item["price"] * $item["quantity"];
        });

        $this->total = $this->subtotal + $this->shippingCost;
    }

    public function render()
    {
        return view("livewire.components.order-summary");
    }
}
