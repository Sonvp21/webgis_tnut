<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $table = "conference";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
