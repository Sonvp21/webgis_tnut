<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\giangduong;
class GiangduongController extends Controller
{
    public function index()
    {
        $items = giangduong::all();
        return view('admin.giangduong.index', compact('items'));
    }

    public function create()
    {
        return view('admin.giangduong.create');
    }

    public function store(Request $request)
    {
        giangduong::create($request->only(['name', 'content']));
        return redirect()->route('giangduong.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $giangduong = giangduong::findOrFail($id);
        return view('admin.giangduong.edit', compact('giangduong'));
    }

    public function update(Request $request, $id)
    {
        $giangduong = giangduong::findOrFail($id);
        $giangduong->update($request->only(['name', 'content']));
        return redirect()->route('giangduong.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $giangduong = giangduong::findOrFail($id);
        $giangduong->delete();
        return redirect()->route('giangduong.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy giangduong theo id
        $giangduong = giangduong::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu giangduong
        return view('admin.giangduong.show', compact('giangduong'));
    }
}
