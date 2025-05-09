<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index()
    {
        return view('web.home');
    }

    public function layer($layer)
    {
        if ($layer === 'borders') {
            $geoJson =
                Cache::rememberForever('borders', function () {
                    return DB::select("SELECT
                        row_to_json(fc) AS data
                    FROM (
                        SELECT
                            'FeatureCollection' AS TYPE,
                            array_to_json(array_agg(f)) AS features
                        FROM (
                            SELECT
                                'Feature' AS TYPE,
                                ST_AsGeoJSON(d.geom)::json AS geometry,
                                row_to_json((
                                    SELECT
                                        p FROM (
                                            SELECT
                                                d.id, d.name, 'borders' layer) AS p)) AS properties
                            FROM
                                lopdhcn1 d
                            GROUP BY
                                d.id) AS f) AS fc");
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }

        if ($layer === 'ytes') {
            $geoJson =
                Cache::rememberForever('ytes', function () {
                    return DB::select("SELECT
                                        row_to_json(fc) AS data
                                    FROM (
                                        SELECT
                                            'FeatureCollection' AS TYPE,
                                            array_to_json(array_agg(f)) AS features
                                        FROM (
                                            SELECT
                                                'Feature' AS TYPE,
                                                ST_AsGeoJSON(c.geom)::json AS geometry,
                                                row_to_json((
                                                    SELECT
                                                        p FROM (
                                                            SELECT
                                                                c.id, c.name AS yte, 'ytes' layer) AS p)) AS properties
                                            FROM
                                                yte c
                                            GROUP BY
                                                c.id) AS f) AS fc");
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
    
    }

    public function indexSidebar()
    {
        return view('web.map.index-sidebar');
    }
}
