<?php

namespace App\Http\Controllers;
use App\Models\thuvien;
use Illuminate\Http\Request;

class ThuvienController extends Controller
{
    public function index()
    {
        $items = thuvien::all();
        return view('admin.thuvien.index', compact('items'));
    }

    public function create()
    {
        return view('admin.thuvien.create');
    }

    public function store(Request $request)
    {
        thuvien::create($request->only(['name', 'content']));
        return redirect()->route('thuvien.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $thuvien = thuvien::findOrFail($id);
        return view('admin.thuvien.edit', compact('thuvien'));
    }

    public function update(Request $request, $id)
    {
        $thuvien = thuvien::findOrFail($id);
        $thuvien->update($request->only(['name', 'content']));
        return redirect()->route('thuvien.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $thuvien = thuvien::findOrFail($id);
        $thuvien->delete();
        return redirect()->route('thuvien.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy thuvien theo id
        $thuvien = thuvien::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu thuvien
        return view('admin.thuvien.show', compact('thuvien'));
    }
}
