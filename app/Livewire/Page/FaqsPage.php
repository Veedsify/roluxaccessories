<?php

namespace App\Livewire\Page;

use Livewire\Component;

class FaqsPage extends Component
{
    public $title = 'Frequently Asked Questions';

    public function render()
    {
        return view('livewire.page.faqs-page');
    }
}
