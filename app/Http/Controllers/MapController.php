<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

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
        if ($layer === 'campus') {
            $geoJson =
                Cache::rememberForever('campus', function () {
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
                                                    c.fid, c.ten, 'campus' layer) AS p)) AS properties
                                FROM
                                    campus c
                                GROUP BY
                                    c.fid) AS f) AS fc");
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'ktx') {
            $geoJson =
                Cache::rememberForever('ktx', function () {
                    return DB::select("SELECT
                            row_to_json(fc) AS data
                        FROM (
                            SELECT
                                'FeatureCollection' AS TYPE,
                                array_to_json(array_agg(f)) AS features
                            FROM (
                                SELECT
                                    'Feature' AS TYPE,
                                    ST_AsGeoJSON(k.geom)::json AS geometry,
                                    row_to_json((
                                        SELECT
                                            p FROM (
                                                SELECT
                                                    k.id, k.ktx, 'ktx' layer) AS p)) AS properties
                                FROM
                                    ktx k
                                GROUP BY
                                    k.id) AS f) AS fc");
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'hoitruong') {
            $geoJson =
                Cache::rememberForever('hoitruong', function () {
                    return DB::select("SELECT
                            row_to_json(fc) AS data
                        FROM (
                            SELECT
                                'FeatureCollection' AS TYPE,
                                array_to_json(array_agg(f)) AS features
                            FROM (
                                SELECT
                                    'Feature' AS TYPE,
                                    ST_AsGeoJSON(h.geom)::json AS geometry,
                                    row_to_json((
                                        SELECT
                                            p FROM (
                                                SELECT
                                                    h.id, h.toa, 'hoitruong' layer) AS p)) AS properties
                                FROM
                                    hoitruong h
                                GROUP BY
                                    h.id, h.geom) AS f) AS fc");

                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'thuvien') {
            $geoJson =
                Cache::rememberForever('thuvien', function () {
                    return DB::select("SELECT
                            row_to_json(fc) AS data
                        FROM (
                            SELECT
                                'FeatureCollection' AS TYPE,
                                array_to_json(array_agg(f)) AS features
                            FROM (
                                SELECT
                                    'Feature' AS TYPE,
                                    ST_AsGeoJSON(t.geom)::json AS geometry,
                                    row_to_json((
                                        SELECT
                                            p FROM (
                                                SELECT
                                                    t.id, t.thuvien, 'thuvien' layer) AS p)) AS properties
                                FROM
                                    thuvien t
                                GROUP BY
                                    t.id, t.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'xuong') {
            $geoJson =
                Cache::rememberForever('xuong', function () {
                    return DB::select("SELECT
                            row_to_json(fc) AS data
                        FROM (
                            SELECT
                                'FeatureCollection' AS TYPE,
                                array_to_json(array_agg(f)) AS features
                            FROM (
                                SELECT
                                    'Feature' AS TYPE,
                                    ST_AsGeoJSON(x.geom)::json AS geometry,
                                    row_to_json((
                                        SELECT
                                            p FROM (
                                                SELECT
                                                    x.id, x.xuong, 'xuong' layer) AS p)) AS properties
                                FROM
                                    xuong x
                                GROUP BY
                                    x.id, x.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'vpkhoa') {
            $geoJson =
                Cache::rememberForever('vpkhoa', function () {
                    return DB::select("SELECT
                            row_to_json(fc) AS data
                        FROM (
                            SELECT
                                'FeatureCollection' AS TYPE,
                                array_to_json(array_agg(f)) AS features
                            FROM (
                                SELECT
                                    'Feature' AS TYPE,
                                    ST_AsGeoJSON(v.geom)::json AS geometry,
                                    row_to_json((
                                        SELECT
                                            p FROM (
                                                SELECT
                                                    v.id, v.khoa, 'vpkhoa' layer) AS p)) AS properties
                                FROM
                                    vpkhoa v
                                GROUP BY
                                    v.id, v.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'cantine') {
            $geoJson =
                Cache::rememberForever('cantine', function () {
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
                                                    c.id, c.cantine, 'cantine' layer) AS p)) AS properties
                                FROM
                                    cantine c
                                GROUP BY
                                    c.id, c.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'conference') {
            $geoJson =
                Cache::rememberForever('conference', function () {
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
                                                    d.id, d.conference, 'conference' layer) AS p)) AS properties
                                FROM
                                    conference d
                                GROUP BY
                                    d.id, d.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'yte') {
            $geoJson =
                Cache::rememberForever('yte', function () {
                    return DB::select("SELECT
                            row_to_json(fc) AS data
                        FROM (
                            SELECT
                                'FeatureCollection' AS TYPE,
                                array_to_json(array_agg(f)) AS features
                            FROM (
                                SELECT
                                    'Feature' AS TYPE,
                                    ST_AsGeoJSON(y.geom)::json AS geometry,
                                    row_to_json((
                                        SELECT
                                            p FROM (
                                                SELECT
                                                    y.id, y.yte, 'yte' layer) AS p)) AS properties
                                FROM
                                    yte y
                                GROUP BY
                                    y.id, y.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'giangduong') {
            $geoJson =
                Cache::rememberForever('giangduong', function () {
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
                                                    g.id, g.nha, 'giangduong' layer) AS p)) AS properties
                                FROM
                                    giangduong g
                                GROUP BY
                                    g.id, g.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
        if ($layer === 'lopdhcn1') {
            $geoJson =
                Cache::rememberForever('lopdhcn1', function () {
                    return DB::select("SELECT
                            row_to_json(fc) AS data
                        FROM (
                            SELECT
                                'FeatureCollection' AS TYPE,
                                array_to_json(array_agg(f)) AS features
                            FROM (
                                SELECT
                                    'Feature' AS TYPE,
                                    ST_AsGeoJSON(l.geom)::json AS geometry,
                                    row_to_json((
                                        SELECT
                                            p FROM (
                                                SELECT
                                                    l.id, l.name, 'lopdhcn1' layer) AS p)) AS properties
                                FROM
                                    lopdhcn1 l
                                GROUP BY
                                    l.id, l.geom) AS f) AS fc");
                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
             if ($layer === 'tuaf') {
           $geoJson = Cache::rememberForever('tuaf', function () {
                  return DB::select("
                     SELECT row_to_json(fc) AS data
                    FROM (
                        SELECT
                            'FeatureCollection' AS TYPE,
                            array_to_json(array_agg(f)) AS features
                        FROM (
                            SELECT
                                'Feature' AS TYPE,
                                ST_AsGeoJSON(u.geom)::json AS geometry,
                                row_to_json((
                                    SELECT p FROM (
                                        SELECT
                                            u.id,u.\"Layer\",'tuaf' AS layer) AS p)) AS properties
                            FROM
                                tuaf u
                            GROUP BY
                                u.id, u.geom) AS f) AS fc");


                                    
                });

            $geoJson = collect($geoJson)->first();

            return json_decode($geoJson->data);
        }
    } // Kết thúc phương thức layer
    public function search(Request $request) {
        $query = $request->input('q');
    
        \Log::info('Search query:', ['q' => $query]);
    
        $locations = DB::table('locations')
            ->select('name', 'latitude', 'longitude')
            ->whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($query) . '%'])
            ->get();
    
        \Log::info('Search results:', ['results' => $locations]);
    
        $features = $locations->map(function ($location) {
            return [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$location->longitude, $location->latitude],
                ],
                'properties' => [
                    'name' => $location->name,
                ],
            ];
        });
    
        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features,
        ]);
    }
    
}