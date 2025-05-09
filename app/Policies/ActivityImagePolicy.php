<?php

namespace App\Policies;

use App\Models\Admin\User;

class ActivityImagePolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('activity_image_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('activity_image_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('activity_image_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('activity_image_destroy');
    }

}
