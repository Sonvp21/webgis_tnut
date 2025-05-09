<?php

namespace App\Http\Controllers;
use App\Models\conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $items = conference::all();
        return view('admin.conference.index', compact('items'));
    }

    public function create()
    {
        return view('admin.conference.create');
    }

    public function store(Request $request)
    {
        conference::create($request->only(['name', 'content']));
        return redirect()->route('conference.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $conference = conference::findOrFail($id);
        return view('admin.conference.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        $conference = conference::findOrFail($id);
        $conference->update($request->only(['name', 'content']));
        return redirect()->route('conference.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $conference = conference::findOrFail($id);
        $conference->delete();
        return redirect()->route('conference.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy conference theo id
        $conference = conference::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu conference
        return view('admin.conference.show', compact('conference'));
    }
}
