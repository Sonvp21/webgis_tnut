<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index()
    {
        $items = Campus::all();
        return view('admin.campus.index', compact('items'));
    }

    public function create()
    {
        return view('admin.campus.create');
    }

    public function store(Request $request)
    {
        Campus::create($request->only(['name', 'content']));
        return redirect()->route('campus.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $campus = Campus::findOrFail($id);
        return view('admin.campus.edit', compact('campus'));
    }

    public function update(Request $request, $id)
    {
        $campus = Campus::findOrFail($id);
        $campus->update($request->only(['name', 'content']));
        return redirect()->route('campus.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $campus = Campus::findOrFail($id);
        $campus->delete();
        return redirect()->route('campus.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy campus theo id
        $campus = campus::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu campus
        return view('admin.campus.show', compact('campus'));
    }
}
