<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryItem extends Model
{
    protected $fillable = ['gallery_id','path','type','caption','category'];

    public function gallery(): BelongsTo { return $this->belongsTo(Gallery::class); }
}
