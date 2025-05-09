<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\Commune;
use App\Models\Admin\District;
use App\Models\Admin\Document;
use App\Models\Admin\Image;
use App\Models\Admin\Role;
use App\Models\Admin\UserCategory;
use App\Models\Admin\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('updated_at', 'desc')->get();
        return view('admin.users.index', compact('users')); // Trả về view với danh sách người dùng
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $user = User::create($validatedData);
        // Lưu các hình ảnh và tệp đính kèm
        if (!empty($request->input('image_paths'))) {
            $files = json_decode($request->input('image_paths'));
            foreach ($files as $file) {
                $file_name = basename($file);
                $newPath = 'user/images/' . $user->id . '/' . $file_name;
                Storage::disk('public')->move($file, $newPath);
                $user->images()->create([
                    'file_path' => $newPath,
                    'file_name' => $file_name,
                ]);
            }
        }
        $user->roles()->attach($request->role_id);
        return redirect()->route('admin.users.index')->with('success', 'tài khoản đã được tạo thành công.');
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit');
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $validatedData = $request->validated();
        $user->update($validatedData);
        $user->roles()->sync($request->role_id);

        // Handle password update if requested
        if ($request->filled('password')) {
            // Validate current password
            if (!Hash::check($request->input('current_password'), $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => 'Mật khẩu cũ không đúng',
                ]);
            }

            // Update password
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }

        // Handle default password reset
        if ($request->filled('reset_password')) {
            $defaultPassword = '12345678'; // Thay bằng mật khẩu mặc định của bạn
            $user->password = Hash::make($defaultPassword);
            $user->save();
        }

        // Xử lý ảnh nếu có thay đổi
        if ($request->filled('retained_images') || $request->filled('new_images')) {
            // Lấy danh sách ảnh được giữ lại
            $retainedImages = $request->filled('retained_images')
                ? json_decode($request->input('retained_images'), true)
                : [];

            // Lấy danh sách ảnh mới
            $newImages = $request->filled('new_images')
                ? json_decode($request->input('new_images'), true)
                : [];

            // 1. Xử lý xóa ảnh
            $existingImages = $user->images()->pluck('file_path')->toArray();
            $imagesToDelete = array_diff($existingImages, $retainedImages);

            foreach ($imagesToDelete as $imagePath) {
                $image = $user->images()
                    ->where('file_path', $imagePath)
                    ->first();

                if ($image) {
                    Storage::disk('public')->delete($image->file_path);
                    $image->delete();
                }
            }

            // 2. Xử lý thêm ảnh mới
            foreach ($newImages as $tempPath) {
                $filename = basename($tempPath);
                $newPath = 'user/images/' . $user->id . '/' . $filename;

                // Tạo thư mục nếu chưa tồn tại
                Storage::disk('public')->makeDirectory('user/images/' . $user->id);

                // Di chuyển file từ temp sang thư mục chính thức
                if (Storage::disk('public')->exists($tempPath)) {
                    Storage::disk('public')->move($tempPath, $newPath);

                    // Tạo record trong DB
                    $user->images()->create([
                        'file_path' => $newPath,
                        'file_name' => $filename
                    ]);
                }
            }
        }
        return redirect()->route('admin.users.index')->with('success', 'Tài khoản đã được cập nhật thành công.');
    }

    public function destroy(user $user): RedirectResponse
    {
        foreach ($user->images as $image) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Xoá thành công.');
    }
}
