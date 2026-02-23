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

public function loadCount($relations){
    //
}
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
