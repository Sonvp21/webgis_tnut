<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductionFacility extends Model
{
    use HasFactory;

    protected $table = 'production_facilities';
    protected $fillable = [
        'name', 'owner', 'address', 'description', 'type', 'note', 'geom'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // Phương thức cập nhật tọa độ
    public function updateCoordinates($id, $longitude, $latitude, $z = 0)
    {
        // Đảm bảo rằng các giá trị tọa độ là số
        if (is_numeric($longitude) && is_numeric($latitude)) {
            $affectedRows = DB::table($this->table)
                ->where('id', $id)
                ->update([
                    'geom' => DB::raw("ST_SetSRID(ST_MakePoint($longitude, $latitude), 4326)")
                ]);

            return $affectedRows > 0;
        }

        return false;
    }

    // Lấy kinh độ từ trường geom
    public function getLongitude($id)
    {
        $result = DB::table($this->table)
            ->select(DB::raw('ST_X(geom) as longitude'))
            ->where('id', $id)
            ->first();

        return $result ? $result->longitude : null;
    }

    // Lấy vĩ độ từ trường geom
    public function getLatitude($id)
    {
        $result = DB::table($this->table)
            ->select(DB::raw('ST_Y(geom) as latitude'))
            ->where('id', $id)
            ->first();

        return $result ? $result->latitude : null;
    }
}
