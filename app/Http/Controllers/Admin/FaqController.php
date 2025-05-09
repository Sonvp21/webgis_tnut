<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Admin\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::orderBy('created_at', 'desc')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * @return Factory|View
     */

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Faq $faq, Request $request): RedirectResponse
    {
        $request->validate([
            'content_answer' => 'required',
        ]);
    
        $faq->update([
            'content_answer' => $request->content_answer,
            'status' => 1, // Cập nhật trạng thái đã trả lời
        ]);
    
        if (! $faq->answered_at) {
            $faq->update(['answered_at' => now()]);
        }
    
        return redirect()->route('admin.faqs.index')->with('success', 'Trả lời thành công');
    }    

    /**
     * @return RedirectResponse
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('success', 'Xoá thành công !');
    }

    public function toggleStatus(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'status' => 'required|in:0,1,2'
        ]);

        $faq->update(['status' => $validated['status']]);

        return response()->json([
            'success' => 1,
            'new_status' => $faq->status
        ]);
    }
}
