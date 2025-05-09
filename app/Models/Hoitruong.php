<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hoitruong extends Model
{
    protected $table = "hoitruong";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
