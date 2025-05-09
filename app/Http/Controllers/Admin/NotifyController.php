<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotifyRequest;
use App\Models\Admin\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NotifyController extends Controller
{
    public function index()
    {
        $notifies = Notify::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.notifies.index', [
            'notifies' => $notifies,
        ]);
    }

    public function create(): View
    {
        return view('admin.notifies.create');
    }

    public function store(NotifyRequest $request): RedirectResponse
    {
        $notify = Notify::create($request->validated());

        return redirect()->route('admin.notifies.index')->with('success', 'Thêm thông báo thành công');
    }

    /**
     * @return RedirectResponse
     */
    public function edit(Notify $notify): View
    {
        return view('admin.notifies.edit', compact('notify'));
    }

    public function update(NotifyRequest $request, Notify $notify): RedirectResponse
    {
        $validatedData = $request->validated();
        $notify->update($validatedData);

        return redirect()->route('admin.notifies.index')->with('success', 'Cập nhật thông báo thành công!');
    }

    public function destroy(Notify $notify): RedirectResponse
    {
        $notify->delete();

        return redirect()->route('admin.notifies.index')->with('success', 'Xoá thông báo thành công');
    }

    public function toggleVisibility(Notify $notify)
    {
        $notify->update([
            'is_visible' => !$notify->is_visible
        ]);
    
        return response()->json(['success' => true]);
    }
    
}
