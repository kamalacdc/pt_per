<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key','value'];
    // protected $casts = ['value' => 'array'];

    public static function getValue(string $key, $default = null)
    {
        $row = static::query()->where('key',$key)->first();
        return $row ? $row->value : $default;
    }
}
