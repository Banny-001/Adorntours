<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'region', 'country', 'image', 'cover_image',
        'short_description','full_description', 'details', 'duration', 'price', 'is_featured',
        'min_group_size', 'max_group_size', 'highlights', 'itinerary','destination'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'highlights' => 'array',
        'itinerary' => 'array',
        'price' => 'float'
    ];
}