<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Notify extends Model
{
    use HasFactory;
    protected $table = 'notifies';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'views',
        'is_visible',
    ];

    protected function updatedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->updated_at)->format('H:i, d.m.Y'),
        );
    }
    protected function createdAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->created_at)->format('H:i, d.m.Y'),
        );
    }

    protected function updatedDateThumb(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->diffForHumans(),
        );
    }

    protected function updatedDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->translatedFormat('l, d/m/Y'),
        );
    }
}
