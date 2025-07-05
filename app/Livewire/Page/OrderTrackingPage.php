<?php

namespace App\Livewire\Page;

use Livewire\Component;

class OrderTrackingPage extends Component
{
    public $title = 'Order Tracking & Returns';

    public $trackingId;

    public function trackOrder (){
        if(!empty($this->trackingId)) {
          $this->redirect(route("order.confirmation", ['order' => $this->trackingId]));
        }
    }

    public function render()
    {
        return view('livewire.page.order-tracking-page');
    }
}
