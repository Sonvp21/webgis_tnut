<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    protected $table = "gate";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;
}
