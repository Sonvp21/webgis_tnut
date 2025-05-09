<?php

namespace App\Policies;

use App\Models\Admin\User;

class VideoPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('video_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('video_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('video_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('video_destroy');
    }

}
