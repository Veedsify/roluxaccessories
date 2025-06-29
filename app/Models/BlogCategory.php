<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    /** @use HasFactory<\Database\Factories\BlogCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($blogCategory) {
            $slug = str($blogCategory->name)->slug();
            Blog::where('slug', $slug)->exists() ? $slug .= '-' . time() : null;
            $blogCategory->slug = $slug;
        });
    }

    public function blog_count()
    {
        return $this->blogs()->count();
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
