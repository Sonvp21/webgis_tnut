<?php

namespace App\Models\Admin;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_path',
        'file_name',

        'imageable_type',
        'imageable_id',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
    
    // Các mối quan hệ
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

    public function activityImage()
    {
        return $this->belongsTo(ActivityImage::class);
    }

    public function productionFacility()
    {
        return $this->belongsTo(ProductionFacility::class);
    }
}
