<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_path',
        'file_name',

        'documentable_type',
        'documentable_id',
    ];

    // Các mối quan hệ
    public function documentable()
    {
        return $this->morphTo();
    }
}
