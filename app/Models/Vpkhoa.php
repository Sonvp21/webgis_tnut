<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vpkhoa extends Model
{
    protected $table = "vpkhoa";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
