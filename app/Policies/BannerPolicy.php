<?php

namespace App\Policies;

use App\Models\Admin\User;

class BannerPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('banner_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('banner_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('banner_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('banner_destroy');
    }

}
