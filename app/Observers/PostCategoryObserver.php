<?php

namespace App\Observers;

use App\Models\Admin\PostCategory;
use Illuminate\Support\Str;

class PostCategoryObserver
{
    public function saving(PostCategory $postCategory)
    {
        $postCategory->name = Str::ucfirst($postCategory->name);
        $postCategory->slug = Str::slug($postCategory->name);
    }
}
