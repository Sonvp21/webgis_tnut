<?php

namespace App\Models\Admin;

use App\Models\Admin\Commune;
use App\Models\Admin\District;
use App\Models\Admin\Image;
use App\Models\Admin\Product;
use App\Models\Admin\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'category_id',
        'district_id',
        'commune_id',
        'name',
        'full_name',
        'phone',
        'address',
        'email',
        'email_verified_at',
        'birthday',
        'description',
        'ip',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'datetime',
    ];

    protected function updatedAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->updated_at)->format('d.m.Y h:i'),
        );
    }

    protected function createdAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->created_at)->format('d.m.Y h:i'),
        );
    }

    protected function birthdayAtVi(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->birthday)->format('d.m.Y'),
        );
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'active' => '<span class="text-green-700 text-xs px-3 py-1 rounded-full font-bold" style="background-color: aquamarine">Kích hoạt</span>',
            'inactive' => '<span class="text-gray-700 text-xs px-3 py-1 rounded-full font-bold" style="background-color: #cccccc">Không kích hoạt</span>',
            'banned' => '<span class="text-white text-xs px-3 py-1 rounded-full font-bold" style="background-color: #ff5b5b">Bị cấm</span>',
            default => '<span class="text-black text-xs px-3 py-1 rounded-full font-bold" style="background-color: #e0e0e0">Không xác định</span>',
        };
    }
}
