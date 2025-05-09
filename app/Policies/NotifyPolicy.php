<?php

namespace App\Policies;

use App\Models\Admin\User;

class NotifyPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('notify_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('notify_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('notify_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('notify_destroy');
    }

}
