<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create()
    {
        // Lấy tất cả quyền cha (parent_id = 0)
        $parentPermissions = Permission::where('parent_id', 0)->get(['id', 'module', 'action', 'parent_id']);

        // Lấy quyền con cho mỗi quyền cha, chỉ lấy khi quyền con có đầy đủ các action: index, create, edit, destroy
        $permissionsWithChildren = $parentPermissions->map(function ($parentPermission) {
            // Lấy các quyền con (có parent_id tương ứng với id của quyền cha), chỉ lấy các trường cần thiết
            $children = Permission::where('parent_id', $parentPermission->id)
                ->whereIn('action', ['index', 'create', 'edit', 'destroy'])
                ->get(['id', 'module', 'action', 'parent_id']);  // Chỉ lấy các trường cần thiết

            // Kiểm tra nếu quyền con có đủ 4 hành động: index, create, edit, destroy
            $actions = ['index', 'create', 'edit', 'destroy'];
            $childActions = $children->pluck('action')->toArray();

            // Kiểm tra nếu có đủ các hành động
            $missingActions = array_diff($actions, $childActions);

            // Nếu thiếu bất kỳ hành động nào, không gán quyền con vào quyền cha
            if (count($missingActions) === 0) {
                // Nếu tất cả các hành động đều có, gán quyền con vào quyền cha
                $parentPermission->children = $children;
            } else {
                // Nếu thiếu hành động, để quyền con rỗng
                $parentPermission->children = [];
            }

            return $parentPermission;
        });

        // Lọc các quyền cha không có quyền con đầy đủ các hành động
        $permissionsWithChildren = $permissionsWithChildren->filter(function ($item) {
            return !empty($item->children) && $item->children->count() > 0;
        });

        // Lấy danh sách quyền đã có từ config
        $excludedModules = config('permissions.table_module', []);

        // Lọc các quyền chưa có trong $permissionsWithChildren
        $existingModules = $permissionsWithChildren->pluck('module')->toArray();

        // Lọc các module không có trong danh sách $excludedModules và chưa có trong $existingModules
        $remainingModules = array_diff($excludedModules, $existingModules);

        // Lấy tất cả quyền hiện có
        $allPermissions = Permission::where('parent_id', 0)
        ->with('childPermissions') // Quan hệ với quyền con
        ->orderBy('updated_at', 'desc')
        ->paginate(5); // Phân trang 5 quyền cha mỗi trang

        // Truyền danh sách còn lại vào view
        return view('admin.permissions.create', compact('remainingModules', 'allPermissions'));
    }

    public function store(Request $request)
    {
        // Kiểm tra xem quyền cha đã tồn tại chưa
        $parentPermission = Permission::where('module', $request->module_parent)
            ->where('parent_id', 0)
            ->first();

        if (!$parentPermission) {
            // Nếu quyền cha chưa tồn tại, tạo mới quyền cha
            $parentPermission = Permission::create([
                'module' => $request->module_parent,
                'action' => $request->module_parent,
                'parent_id' => 0
            ]);
        }

        // Duyệt qua các quyền con và kiểm tra nếu chưa có thì thêm mới
        foreach ($request->module_childrent as $value) {
            $existingChildPermission = Permission::where('module', $value)
                ->where('parent_id', $parentPermission->id)
                ->first();

            if (!$existingChildPermission) {
                // Nếu quyền con chưa tồn tại, tạo mới quyền con
                Permission::create([
                    'module' => $value,
                    'action' => $value,
                    'parent_id' => $parentPermission->id,
                    'key_code' => $request->module_parent . '_' . $value
                ]);
            }
        }

        return redirect()->route('admin.permissions.create')->with('success', 'Thêm thành công');
    }
}
