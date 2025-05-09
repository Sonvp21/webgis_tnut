<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    use HasFactory;
    
    protected $fillable = ['title'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
