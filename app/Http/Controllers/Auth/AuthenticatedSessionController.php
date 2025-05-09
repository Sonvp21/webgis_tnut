<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Thực hiện xác thực người dùng
        $request->authenticate();

        // Tạo session mới sau khi đăng nhập
        $request->session()->regenerate();

        // Lấy URL redirect từ session hoặc về mặc định là route home
        $redirectUrl = $request->session()->get('redirect_to', route('home'));

        // Xóa URL khỏi session để tránh chuyển hướng lại lần sau
        $request->session()->forget('redirect_to');

        // Chuyển hướng đến URL cần redirect
        return redirect()->to($redirectUrl);
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function saveUrl(Request $request)
    {
        // Lưu URL vào session
        $request->session()->put('redirect_to', $request->redirect_url);
        return response()->json(['message' => 'URL saved']);
    }
}
