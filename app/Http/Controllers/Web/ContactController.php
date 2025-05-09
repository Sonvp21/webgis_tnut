<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactRequest;
use App\Models\Admin\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('web.contacts.index');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create([
            'title' => $request->title,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
            'status' => 0, // Luôn mặc định là 0 - chưa xử lý
        ]);

        session()->flash('success', 'Gửi liên hệ thành công!');

        return back();
    }
}
