<?php

namespace App\View\Components\Website;

use App\Models\Admin\Post as AdminPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomePost extends Component
{
    public function render(): View|Closure|string
    {
        // Lấy danh sách bài viết mới nhất
        $posts = AdminPost::query()
            ->with(['images']) // Tải trước mối quan hệ category và images
            ->where('status', true)
            ->latest('published_at')
            ->latest('updated_at')
            ->take(4)
            ->get();

        return view('components.website.home-post', [
            'posts' => $posts,
            'latestPost' => $posts->first(), // Bài viết mới nhất
        ]);
    }
}
