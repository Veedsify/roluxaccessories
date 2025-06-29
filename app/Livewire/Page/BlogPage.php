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
            'recentPosts' => \App\Models\Blog::orderBy('created_at', 'desc')
                ->take(3)
                ->get(),
            'categories' => \App\Models\BlogCategory::orderBy('name', 'asc')
                ->get(),
        ]);
    }
}
