<?php

namespace App\Livewire\Page;

use App\Models\Brand;
use App\Models\Collection;
use Livewire\Component;

class CollectionPage extends Component
{

    public $collections;
    public function mount()
    {
      $this->collections = Collection::whereHas('products', function ($query) {
          $query->where('active', true);
      })->get();
    }
    public function render()
    {
        return view('livewire.page.collection-page', [
            'collections' => $this->collections,
        ]);
    }
}
