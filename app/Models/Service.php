<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'excerpt',
        'content',
        'image',
        'is_active',
        'sort'
    ];


    protected $casts = [
        'is_active' => 'boolean',
    ];
}
