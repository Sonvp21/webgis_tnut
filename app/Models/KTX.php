<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KTX extends Model
{
    protected $table = "ktx";
    protected $fillable = [
        'name',
        'content',
    ];
    public $timestamps = false;

}
