<?php

namespace App\Http\Controllers;
use App\Models\Vpkhoa;
use Illuminate\Http\Request;

class VpkhoaController extends Controller
{
    public function index()
    {
        $items = vpkhoa::all();
        return view('admin.vpkhoa.index', compact('items'));
    }

    public function create()
    {
        return view('admin.vpkhoa.create');
    }

    public function store(Request $request)
    {
        vpkhoa::create($request->only(['name', 'content']));
        return redirect()->route('vpkhoa.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $vpkhoa = vpkhoa::findOrFail($id);
        return view('admin.vpkhoa.edit', compact('vpkhoa'));
    }

    public function update(Request $request, $id)
    {
        $vpkhoa = vpkhoa::findOrFail($id);
        $vpkhoa->update($request->only(['name', 'content']));
        return redirect()->route('vpkhoa.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $vpkhoa = vpkhoa::findOrFail($id);
        $vpkhoa->delete();
        return redirect()->route('vpkhoa.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy vpkhoa theo id
        $vpkhoa = vpkhoa::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu vpkhoa
        return view('admin.vpkhoa.show', compact('vpkhoa'));
    }
}
