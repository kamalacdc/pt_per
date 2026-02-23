<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partner extends Model
{
    protected $fillable = ['name','logo_path','url','is_active'];

    public function projects(): BelongsToMany { return $this->belongsToMany(Project::class); }
}
