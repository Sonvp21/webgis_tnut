<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\yte;
class YteController extends Controller
{
    public function index()
    {
        $items = yte::all();
        return view('admin.yte.index', compact('items'));
    }

    public function create()
    {
        return view('admin.yte.create');
    }

    public function store(Request $request)
    {
        yte::create($request->only(['name', 'content']));
        return redirect()->route('yte.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $yte = yte::findOrFail($id);
        return view('admin.yte.edit', compact('yte'));
    }

    public function update(Request $request, $id)
    {
        $yte = yte::findOrFail($id);
        $yte->update($request->only(['name', 'content']));
        return redirect()->route('yte.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $yte = yte::findOrFail($id);
        $yte->delete();
        return redirect()->route('yte.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy yte theo id
        $yte = yte::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu yte
        return view('admin.yte.show', compact('yte'));
    }
}
