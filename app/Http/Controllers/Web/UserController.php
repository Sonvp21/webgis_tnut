<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin\Commune;
use App\Models\Admin\District;
use App\Models\Admin\Document;
use App\Models\Admin\Initiative;
use App\Models\Admin\IntellectualPropertyReport;
use App\Models\Admin\TechnicalInnovationDossier;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Hiển thị thông tin user
    public function show()
    {
        $user = Auth::user();
        return view('web.users.profile', compact('user'));
    }
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('web.users.edit_profile', compact('user'));
    }

    // Xử lý cập nhật thông tin cá nhân
    public function update(Request $request, User $user)
    {
        // Đảm bảo chỉ cho phép cập nhật nếu là tài khoản của chính người dùng
        if (Auth::id() !== $user->id) {
            abort(403, 'Bạn không có quyền cập nhật thông tin của người dùng này.');
        }

        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'birthday' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        // Cập nhật thông tin người dùng
        $user->update($validatedData);

        return redirect()->route('web.profile.show')->with('success', 'Cập nhật thông tin cá nhân thành công!');
    }
}
