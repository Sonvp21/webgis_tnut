<?php

namespace App\Http\Controllers;
use App\Models\hoitruong;
use Illuminate\Http\Request;

class HoitruongController extends Controller
{
    public function index()
    {
        $items = hoitruong::all();
        return view('admin.hoitruong.index', compact('items'));
    }

    public function create()
    {
        return view('admin.hoitruong.create');
    }

    public function store(Request $request)
    {
        hoitruong::create($request->only(['name', 'content']));
        return redirect()->route('hoitruong.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $hoitruong = hoitruong::findOrFail($id);
        return view('admin.hoitruong.edit', compact('hoitruong'));
    }

    public function update(Request $request, $id)
    {
        $hoitruong = hoitruong::findOrFail($id);
        $hoitruong->update($request->only(['name', 'content']));
        return redirect()->route('hoitruong.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $hoitruong = hoitruong::findOrFail($id);
        $hoitruong->delete();
        return redirect()->route('hoitruong.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy hoitruong theo id
        $hoitruong = hoitruong::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu hoitruong
        return view('admin.hoitruong.show', compact('hoitruong'));
    }
}
