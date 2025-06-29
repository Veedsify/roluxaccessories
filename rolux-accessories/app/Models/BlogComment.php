<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    /** @use HasFactory<\Database\Factories\BlogCommentFactory> */
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'user_id',
        'comment',
        'commenter_name',
        'commenter_email',
        'is_verified',
        'parent_id',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
