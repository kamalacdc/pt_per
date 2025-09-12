<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'title',
        'description',
        'filename',
        'sort_order',
        'is_active',
    ];
}
