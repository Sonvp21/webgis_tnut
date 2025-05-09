<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thuvien extends Model
{
    protected $table = "thuvien";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
