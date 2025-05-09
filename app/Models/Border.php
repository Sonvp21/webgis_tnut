<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Border extends Model
{
    protected $table = "lopdhcn1";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
