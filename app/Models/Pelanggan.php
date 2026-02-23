<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'category_id',
        'nama',
        'title',
        'tanggal_pelanggan',
        'perusahaan',
        'email',
        'phone',
        'alamat'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
