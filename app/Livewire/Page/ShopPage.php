<?php

namespace App\Livewire\Page;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShopPage extends Component
{

    public $display = "grid";
    public $text = "Power";

    public function test()
    {
        Log::info("Test function called in ShopPage" .  $this->text);
    }

    public function switchDisplay($display)
    {
        Log::info("Switching display to: {$display}");
        $this->display = $display;
    }

    public function render()
    {
        return view('livewire.page.shop-page', [
            "text" => $this->text
        ]);
    }
}
