<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    protected function updatedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->updated_at)->format('H:i, d/m/Y'),
        );
    }
}
