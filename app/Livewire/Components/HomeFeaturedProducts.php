<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Product;

class HomeFeaturedProducts extends Component
{
    public $tab = 'best sellers';
    public $bestSellers = [];
    public $onSale = [];
    public $newArrivals = [];

    protected $queryString = ['tab'];

    public function mount()
    {
        $this->loadAllProducts();
    }

    public function updatedTab($value)
    {
        $this->tab = $value;
        // No need to fetch here since we're loading all products at once
    }

    public function loadAllProducts()
    {
        // Load all product categories at once to prevent multiple requests
        $this->bestSellers = Product::orderBy('sold', 'desc')
            ->take(6)
            ->get();

        $this->onSale = Product::where('sale', true)
            ->latest()
            ->take(6)
            ->get();

        $this->newArrivals = Product::latest()
            ->take(6)
            ->get();
    }

    public function selectTab($tab)
    {
        $this->tab = $tab;
        // No need to fetch here since we're using client-side switching
    }

    public function render()
    {
        return view('livewire.components.home-featured-products');
    }
}
