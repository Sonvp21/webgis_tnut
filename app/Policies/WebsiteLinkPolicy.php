<?php

namespace App\Policies;

use App\Models\Admin\User;

class WebsiteLinkPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('website_link_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('website_link_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('website_link_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('website_link_destroy');
    }

}
