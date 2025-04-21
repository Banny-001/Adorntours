<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'category',
        'tags',
        'author_name',
        'author_avatar_url',
        'is_featured',
        'published_at',
        'view_count',
        'meta_title',
        'meta_description',
        'seo_keywords',
    ];
    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];
}
