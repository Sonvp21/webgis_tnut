<?php

namespace App\Http\Controllers;
use App\Models\gate;
use Illuminate\Http\Request;

class GateController extends Controller
{
    public function index()
    {
        $items = gate::all();
        return view('admin.gate.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gate.create');
    }

    public function store(Request $request)
    {
        gate::create($request->only(['name', 'content']));
        return redirect()->route('gate.index')->with('success', 'Đã thêm mới!');
    }

    public function edit($id)
    {
        $gate = gate::findOrFail($id);
        return view('admin.gate.edit', compact('gate'));
    }

    public function update(Request $request, $id)
    {
        $gate = gate::findOrFail($id);
        $gate->update($request->only(['name', 'content']));
        return redirect()->route('gate.index')->with('success', 'Đã cập nhật!');
    }

    public function destroy($id)
    {
        $gate = gate::findOrFail($id);
        $gate->delete();
        return redirect()->route('gate.index')->with('success', 'Đã xóa!');
    }
    public function show($id)
    {
        // Lấy gate theo id
        $gate = gate::findOrFail($id); // Nếu không tìm thấy, sẽ tự động trả về lỗi 404

        // Trả về view chi tiết với dữ liệu gate
        return view('admin.gate.show', compact('gate'));
    }
}
