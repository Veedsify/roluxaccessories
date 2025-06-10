<?php

namespace App\Livewire\Page;

use Livewire\Component;

class HomePage extends Component
{
    public $title = 'Home Page';
    public function render()
    {
        return view('livewire.page.home-page');
    }
}
