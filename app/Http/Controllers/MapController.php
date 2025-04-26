<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Map\Commune;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index()
    {
        return view('maps.index');
    }
    public function layer($layer)
    {
        if ($layer === 'gate') {
            $geoJson =
                Cache::rememberForever('gate', function () {
                    return DB::select("SELECT
                        row_to_json(fc) AS data
                    FROM (
                        SELECT
                            'FeatureCollection' AS TYPE,
                            array_to_json(array_agg(f)) AS features
                        FROM (
                            SELECT
                                'Feature' AS TYPE,
                                ST_AsGeoJSON(g.geom)::json AS geometry,
                                row_to_json((
                                    SELECT
                                        p FROM (
                                            SELECT
                                               g.fid, 'gate' layer ) AS p)) AS properties
                            FROM
                                gate g

                            GROUP BY
                                g.fid) AS f) AS fc");
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }

        if ($layer === 'districts') {
            $geoJson =
                Cache::rememberForever('districts', function () {
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
                                                d.id, d.name AS district, d.area, d.population, d.updated_at, d.color, 'districts' layer) AS p)) AS properties
                            FROM
                                rg_huyen d

                            GROUP BY
                                d.id) AS f) AS fc");
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }

        if ($layer === 'communes') { // this is xa
            $geoJson =
                Cache::rememberForever('communes', function () {
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
                                                    c.id, c.district_i, c.name AS commune, c.area, c.population, c.household, c.density, c.time_updat, 'communes' layer) AS p)) AS properties
                                FROM
                                    rg_xa c
                                GROUP BY
                                    c.gid) AS f) AS fc");
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
         
    }
}
