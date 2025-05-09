<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cantine;
class CantineController extends Controller
{
    public function index()
    {
        $items = Cantine::all();
        return view('admin.cantine.index', compact('items'));
    }

    public function create()
    {
        return view('admin.cantine.create');
    }

    public function store(Request $request)
    {
        cantine::create($request->only(['name', 'content']));
        return redirect()->route('cantine.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $cantine = cantine::findOrFail($id);
        return view('admin.cantine.edit', compact('cantine'));
    }

    public function update(Request $request, $id)
    {
        $cantine = cantine::findOrFail($id);
        $cantine->update($request->only(['name', 'content']));
        return redirect()->route('cantine.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $cantine = cantine::findOrFail($id);
        $cantine->delete();
        return redirect()->route('cantine.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy cantine theo id
        $cantine = cantine::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu cantine
        return view('admin.cantine.show', compact('cantine'));
    }
}
