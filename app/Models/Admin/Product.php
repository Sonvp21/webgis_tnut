<?php

namespace App\Models\Admin;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // 'district_id',
        'commune_id',
        'user_id',
        'name',
        'slug',
        'owner',
        'address',
        'representatives',
        'content',
        'weight',
        'price'
    ];
    //mqh các bảng
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // public function district()
    // {
    //     return $this->belongsTo(District::class);
    // }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updatedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->updated_at)->format('H:i, d/m/Y'),
        );
    }
}
