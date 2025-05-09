<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yte extends Model
{
    protected $table = "yte";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
