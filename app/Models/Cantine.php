<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cantine extends Model
{
    protected $table = "cantine";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
