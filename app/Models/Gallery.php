<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = ['title','slug','description'];

    public function items(): HasMany { return $this->hasMany(GalleryItem::class); }
}
