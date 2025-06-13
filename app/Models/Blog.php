<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbImg',
        'coverImg',
        'description',
        'blog_category_id',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $slug = str($blog->title)->slug();
            Blog::where('slug', $slug)->exists() ? $slug .= '-' . time() : null;
            $blog->slug = $slug;
        });
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }
}
