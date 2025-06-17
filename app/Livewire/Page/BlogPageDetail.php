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
        if (!$post) {
            abort(404, 'Blog post not found');
        }

        $comments = $post->comments()->with('user')->paginate(10);
        $commentsCount = $post->comments()->count();
        $relatedPosts = \App\Models\Blog::where('id', '!=', $post->id)
            ->where('blog_category_id', $post->blog_category_id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('livewire.page.blog-page-detail', [
            'post' => $post,
            'comments' => $comments,
            'commentsCount' => $commentsCount,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
