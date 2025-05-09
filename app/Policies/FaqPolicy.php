<?php

namespace App\Policies;

use App\Models\Admin\User;

class FaqPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('faq_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('faq_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('faq_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('faq_destroy');
    }

}
