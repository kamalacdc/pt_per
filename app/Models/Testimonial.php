<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name','title','company','photo_path','body','published_at','sort','is_active'];

    protected $casts = [
        'published_at' => 'date',
    ];
}
