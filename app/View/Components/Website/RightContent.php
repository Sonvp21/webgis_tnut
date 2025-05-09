<?php

namespace App\View\Components\Website;

use App\Models\Admin\Notify;
use App\Models\Admin\Video;
use App\Models\Admin\WebsiteLink;
use Illuminate\View\Component;

class RightContent extends Component
{
    public $notifies;
    public $websiteLinks;
    public $latestVideo;

    public function __construct()
    {
        // Lấy danh sách thông báo mới nhất, chỉ hiển thị các thông báo có is_visible = 1
        $this->notifies = Notify::where('is_visible', 1)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $this->websiteLinks = WebsiteLink::orderBy('position', 'asc')->get();

        // Lấy video mới nhất
        $this->latestVideo = Video::orderBy('published_at', 'desc')->first();
    }

    public function render()
    {
        return view('components.website.right-content', [
            'notifies' => $this->notifies,
            'websiteLinks' => $this->websiteLinks,
            'latestVideo' => $this->latestVideo
        ]);
    }
}
