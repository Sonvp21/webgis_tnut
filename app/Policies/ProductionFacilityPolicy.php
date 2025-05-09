<?php

namespace App\Policies;

use App\Models\Admin\User;

class ProductionFacilityPolicy
{
//tên biến trùng vs database
    public function index(User $user): bool
    {
        return $user->checkPermissionAccess('production_facility_index');
    }

    public function create(User $user): bool
    {
        return $user->checkPermissionAccess('production_facility_create');
    }

    public function edit(User $user): bool
    {
        return $user->checkPermissionAccess('production_facility_edit');
    }

    public function destroy(User $user): bool
    {
        return $user->checkPermissionAccess('production_facility_destroy');
    }

}
