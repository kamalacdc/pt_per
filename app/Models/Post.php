<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable = ['title','slug','excerpt','content','published_at','thumb_path'];
    protected $casts = ['published_at' => 'datetime'];

    public function categories(): BelongsToMany { return $this->belongsToMany(PostCategory::class); }
    public function category()
{
    return $this->belongsTo(PostCategory::class, 'post_category_id');
}

}
