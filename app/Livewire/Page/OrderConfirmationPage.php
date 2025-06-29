<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\Order;

class OrderConfirmationPage extends Component
{
    public $order;

    public function mount($order)
    {
        // Accept either an Order model or an order ID/order_number
        if ($order instanceof Order) {
            $this->order = $order;
        } elseif (is_numeric($order)) {
            $this->order = Order::where('id', $order)->firstOrFail();
        } else {
            $this->order = Order::where('order_number', $order)->firstOrFail();
        }
    }

    public function getOrderStatusProperty()
    {
        return $this->order->status;
    }

    public function render()
    {
        return view('livewire.page.order-confirmation-page', [
            'order' => $this->order,
            'orderStatus' => $this->getOrderStatusProperty(),
        ]);
    }
}
