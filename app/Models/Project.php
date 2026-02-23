<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = ['title','slug','image','excerpt','content','is_active'];

    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function partners(): BelongsToMany { return $this->belongsToMany(Partner::class); }
}
