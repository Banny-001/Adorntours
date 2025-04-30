<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'icon', 'title', 'description', 'link','file_path'
    ];
}
