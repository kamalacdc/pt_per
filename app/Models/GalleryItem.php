<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryItem extends Model
{
    protected $fillable = ['gallery_id', 'title', 'image', 'category', 'is_active'];

    public function gallery(): BelongsTo { return $this->belongsTo(Gallery::class); }
}
