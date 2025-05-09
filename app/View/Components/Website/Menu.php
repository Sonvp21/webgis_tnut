<?php

namespace App\View\Components\Website;

use App\Models\Admin\PostCategory;
use App\Models\Admin\Product;
use Illuminate\View\Component;

class Menu extends Component
{
    public function render()
    {
        return view('components.website.menu');
    }
}
