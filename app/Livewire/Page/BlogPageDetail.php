<?php

namespace App\Livewire\Page;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogPageDetail extends Component
{
    public $slug;
    public $commenter_name;
    public $commenter_email;
    public $comment_content;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function submitComment()
    {
        $this->validate([
            'commenter_name' => 'required|string|max:255',
            'commenter_email' => 'required|email|max:255',
            'comment_content' => 'required|string|max:1000',
        ]);

        $post = \App\Models\Blog::where('slug', $this->slug)->firstOrFail();
        $post->comments()->create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'commenter_name' => $this->commenter_name,
            'commenter_email' => $this->commenter_email,
            'comment' => $this->comment_content,
        ]);

        session()->flash('message', 'Comment submitted successfully.');
        return redirect()->route('blog.detail', ['slug' => $this->slug]);
    }


    public function render()
    {
        $post = \App\Models\Blog::where('slug', $this->slug)->firstOrFail();
        if (!$post) {
            abort(404, 'Blog post not found');
        }

        $comments = $post->comments()->with('user')->orderBy('created_at', 'desc')->paginate(5);
        $commentsCount = $post->comments()->count();
        $relatedPosts = \App\Models\Blog::where('id', '!=', $post->id)
            ->where('blog_category_id', $post->blog_category_id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $nextPost = \App\Models\Blog::where('id', '>', $post->id)
            ->orderBy('id', 'asc')
            ->first();
        $previousPost = \App\Models\Blog::where('id', '<', $post
            ->id)
            ->orderBy('id', 'desc')
            ->first();
        return view('livewire.page.blog-page-detail', [
            'post' => $post,
            'comments' => $comments,
            'commentsCount' => $commentsCount,
            'relatedPosts' => $relatedPosts,
            'nextPost' => $nextPost,
            'previousPost' => $previousPost,
        ]);
    }
}
