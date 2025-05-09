<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giangduong extends Model
{
    protected $table = "giangduong";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;

}
