<?php

namespace App\Policies;

use App\Models\Admin\User;

class PostPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('post_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('post_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('post_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('post_destroy');
    }

}
