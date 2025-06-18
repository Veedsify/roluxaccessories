<?php

namespace App\Livewire\Page;

use App\Models\Brand;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AboutPage extends Component
{


    public function getBrands(): \Illuminate\Database\Eloquent\Collection
    {
        return Brand::where('is_active', true)->get();
    }
    public function render()
    {
        return view('livewire.page.about-page', [
            'brands' => $this->getBrands(),
        ]);
    }
}
