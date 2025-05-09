<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'title',
        'content',
        'views',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime:Y-m-d H:i:s',
    ];

    /*
    * -------------------------------------------------------------------------------------
    * RELATIONSHIPS
    * -------------------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getImageUrlsAttribute()
    {
        $path = "public/post/images/{$this->id}/";
        $files = Storage::files($path);
    
        if (empty($files)) {
            return [asset('storage/default-image.jpg')];
        }
    
        return array_map(fn($file) => asset(Storage::url($file)), $files);
    }
    /*
    * -------------------------------------------------------------------------------------
    * SCOPES
    * -------------------------------------------------------------------------------------
    */
    public function scopePublished($query)
    {
        return $query->whereDate('published_at', '<=', now());
    }

    /*
    * -------------------------------------------------------------------------------------
    * ACCESSOR & MUTATOR
    * -------------------------------------------------------------------------------------
    */
    public function publishedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->published_at)->format('H:i, d.m.Y'),
        );
    }

    protected function publishedPostDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->published_at ? $this->published_at->translatedFormat('l, d/m/Y') : null,
        );
    }

    protected function updatedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->updated_at)->format('H:i, d.m.Y'),
        );
    }

    protected function publishedPostDateThumb(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->published_at->diffForHumans(),
        );
    }
}
