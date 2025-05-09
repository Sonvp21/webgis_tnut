<?php

namespace App\Http\Controllers;

use App\Models\KTX;
use Illuminate\Http\Request;

class KTXController extends Controller
{
    public function index()
    {
        $items = KTX::all();
        return view('admin.ktx.index', compact('items'));
    }

    public function create()
    {
        return view('admin.ktx.create');
    }

    public function store(Request $request)
    {
        KTX::create($request->only(['name', 'content']));
        return redirect()->route('ktx.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $ktx = KTX::findOrFail($id);
        return view('admin.ktx.edit', compact('ktx'));
    }

    public function update(Request $request, $id)
    {
        $ktx = KTX::findOrFail($id);
        $ktx->update($request->only(['name', 'content']));
        return redirect()->route('ktx.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $ktx = KTX::findOrFail($id);
        $ktx->delete();
        return redirect()->route('ktx.index')->with('success', 'Đã xóa!');
    }

    public function show($id)
    {
        // Lấy KTX theo id
        $ktx = KTX::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu KTX
        return view('admin.ktx.show', compact('ktx'));
    }

}
