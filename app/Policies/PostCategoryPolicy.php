<?php

namespace App\Policies;

use App\Models\Admin\User;

class PostCategoryPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('post_category_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('post_category_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('post_category_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('post_category_destroy');
    }

}
