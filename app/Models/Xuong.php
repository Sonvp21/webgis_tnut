<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xuong extends Model
{
    protected $table = "xuong";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
