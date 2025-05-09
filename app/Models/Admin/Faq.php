<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $fillable = [
        'asker_name',
        'phone',
        'email',
        'address',
        'title',

        'content_question',
        'content_answer',
        'read_at',
        'answered_at',
        'status',
    ];

    protected $casts = [
        'read_at' => 'datetime',
        'answered_at' => 'datetime',
    ];

    public function getAnsweredAtVnAttribute()
    {
        return ($this->answered_at) ? $this->answered_at->format('H:ia, d/m/Y') : '-';
    }

    protected function submittedDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at->format('H:i, d/m/Y')
        );
    }

    protected function answeredDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->answered_at?->format('H:i, d/m/Y')
        );
    }

    protected function createdAtDiffForHumans(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at->diffForHumans(),
        );
    }

    protected function updatedAtDiffForHumans(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->diffForHumans(),
        );
    }
}
