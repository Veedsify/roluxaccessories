<?php

namespace App\Livewire\Page;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProductDetailPage extends Component
{
    public $productSlug; // Store the product slug for fetching details

    public function mount($slug)
    {
        $this->productSlug = $slug; // Store the product slug for fetching details
    }

    public function render()
    {
        return view('livewire.page.product-detail-page',[
            'productSlug' => $this->productSlug,
        ]);
    }
}
