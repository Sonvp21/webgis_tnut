<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = [];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
