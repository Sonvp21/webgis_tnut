<?php

namespace App\Http\Controllers;
use App\Models\xuong;
use Illuminate\Http\Request;

class XuongController extends Controller
{
    public function index()
    {
        $items = xuong::all();
        return view('admin.xuong.index', compact('items'));
    }

    public function create()
    {
        return view('admin.xuong.create');
    }

    public function store(Request $request)
    {
        xuong::create($request->only(['name', 'content']));
        return redirect()->route('xuong.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $xuong = xuong::findOrFail($id);
        return view('admin.xuong.edit', compact('xuong'));
    }

    public function update(Request $request, $id)
    {
        $xuong = xuong::findOrFail($id);
        $xuong->update($request->only(['name', 'content']));
        return redirect()->route('xuong.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $xuong = xuong::findOrFail($id);
        $xuong->delete();
        return redirect()->route('xuong.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy xuong theo id
        $xuong = xuong::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu xuong
        return view('admin.xuong.show', compact('xuong'));
    }
}
