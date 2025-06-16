<?php

namespace App\Livewire\Page;

use Livewire\Component;
use Livewire\WithPagination;

class BlogPage extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.page.blog-page', [
            'posts' => \App\Models\Blog::orderBy('created_at', 'desc')
                ->paginate(6),
        ]);
    }
}
