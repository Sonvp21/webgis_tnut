<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin\Notify;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Post::class, 'title', 'content')
            ->registerModel(Notify::class, 'title', 'content')
            ->perform($request->input('query'));

        $results = $searchResults->map(function ($result) {
            return [
                'id' => $result->searchable->id,
                'title' => $result->title,
                'url' => $result->url,
                'content' => $result->searchable->content,
                'searchable_type' => get_class($result->searchable),
            ];
        });

        return response()->json($results);
    }
}
