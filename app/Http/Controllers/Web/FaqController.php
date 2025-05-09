<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\FaqRequest;
use App\Models\Admin\Faq;
use Illuminate\View\View;

class FaqController extends Controller
{
    // Phương thức index chỉ dùng để hiển thị trang chính.
    public function index(): View
    {
        $faqs = Faq::where('status', 1) // Chỉ lấy câu hỏi đã trả lời
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        return view('web.faqs.index', compact('faqs'));
    }
    
    public function store(FaqRequest $request)
    {
        $data = $request->validated();

        // Đặt trạng thái mặc định là 0 (chưa trả lời)
        $data['status'] = 0;

        Faq::create($data);

        session()->flash('success', 'Gửi câu hỏi thành công!');

        return back();
    }
}
