<?php

namespace App\Livewire\Page;

use App\Models\Brand;
use App\Models\Collection;
use Livewire\Component;

class HomePage extends Component
{
    public $title = 'Home Page';
    public function getCollection(): \Illuminate\Database\Eloquent\Collection
    {
        return Collection::where([
            'is_active' => true,
            'is_featured' => true,
        ])->with(['brand', 'products' => function ($query) {
            $query->where('active', true);
        }])->latest()->take(3)->get();
    }
    public function getBrands(): \Illuminate\Database\Eloquent\Collection
    {
        return Brand::where('is_active', true)->get();
    }
    public function render()
    {
        return view('livewire.page.home-page', [
            'collections' => $this->getCollection(),
            'brands' => $this->getBrands(),
        ]);
    }
}
