<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin\ActivityImage;
use App\Models\Admin\Banner;
use App\Models\Admin\Notify;
use App\Models\Admin\Post;
use App\Models\Admin\PostCategory;
use App\Models\Admin\Product;
use App\Models\Admin\Video;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('web.home');
    }

    public function indexAbout(): View
    {
        return view('web.about');
    }
}
