<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_path',
        'file_name',

        'videoable_type',
        'videoable_id',

        'published_at',
    ];


    public function videoable()
    {
        return $this->morphTo();
    }

    public function publishedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->published_at)->format('l, d.m.Y'),
        );
    } 
}
