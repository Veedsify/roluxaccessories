<?php

namespace App\Livewire\Page;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AboutPage extends Component
{

    public function test()
    {
        Log::info("Test function called in About Page");
    }
    public function render()
    {
        return view('livewire.page.about-page');
    }
}
