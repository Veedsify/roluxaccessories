<?php

namespace App\Livewire\Page;

use Livewire\Component;

class PrivacyPolicyPage extends Component
{
    public $title = 'Privacy Policy';

    public function render()
    {
        return view('livewire.page.privacy-policy-page');
    }
}
