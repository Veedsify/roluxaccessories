<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SearchForm extends Component
{
    public $query = '';
    public $suggestions = [];
    public $showSuggestions = false;

    public function updatedQuery()
    {
        if (strlen($this->query) >= 2) {
            $this->getSuggestions();
            $this->showSuggestions = true;
        } else {
            $this->suggestions = [];
            $this->showSuggestions = false;
        }
    }

    public function getSuggestions()
    {
        $this->suggestions = \App\Models\Product::where('active', true)
            ->where('name', 'LIKE', "%{$this->query}%")
            ->limit(5)
            ->pluck('name')
            ->toArray();
    }

    public function search()
    {
        if (!empty($this->query)) {
            return redirect()->route('search', ['q' => $this->query]);
        }
    }

    public function selectSuggestion($suggestion)
    {
        $this->query = $suggestion;
        $this->showSuggestions = false;
        $this->search();
    }

    public function hideSuggestions()
    {
        // Add a small delay to allow for suggestion clicks
        $this->dispatch('hide-suggestions-delayed');
    }

    public function render()
    {
        return view('livewire.components.search-form');
    }
}
