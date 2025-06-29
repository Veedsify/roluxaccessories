<?php

namespace App\Livewire\Page;

use Livewire\Component;

class OrderTrackingPage extends Component
{
    public $title = 'Order Tracking & Returns';

    public function render()
    {
        return view('livewire.page.order-tracking-page');
    }
}
