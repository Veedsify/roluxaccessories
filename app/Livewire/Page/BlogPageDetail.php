<?php

namespace App\Livewire\Page;

use Livewire\Component;

class BlogPageDetail extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }


    public function render()
    {
        $post = \App\Models\Blog::where('slug', $this->slug)->firstOrFail();
        return view('livewire.page.blog-page-detail', [
            'post' => $post,
        ]);
    }
}
