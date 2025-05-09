<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'district_id',
        'area',
        'population',
        'updated_year',
    ];
    protected $table = 'communes';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
