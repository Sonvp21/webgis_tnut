<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['title', 'full_name', 'content', 'email', 'phone', 'status', 'read_at'];

    protected function createdAtVi(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->created_at)->format('h:i, d.m.Y'),
        );
    }

    protected function readAtVi(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->read_at)->format('h:i, d.m.Y'),
        );
    }
}
