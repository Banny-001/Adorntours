<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomTour extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'group_size',
        'destinations',
        'start_date',
        'duration',
        'interests',
        'additional_info',
    ];
    
}
