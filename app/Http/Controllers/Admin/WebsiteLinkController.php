<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteLink;
use Illuminate\Http\Request;

class WebsiteLinkController extends Controller
{
    public function index()
    {
        $websiteLinks = WebsiteLink::orderBy('position')->get();
        return view('admin.website_links.index', compact('websiteLinks'));
    }

    public function create()
    {
        return view('admin.website_links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'position' => 'integer|min:0',
        ]);

        WebsiteLink::create($request->all());
        return redirect()->route('admin.website_links.index')->with('success', 'Liên kết đã được tạo!');
    }

    public function edit(WebsiteLink $websiteLink)
    {
        return view('admin.website_links.edit', compact('websiteLink'));
    }

    public function update(Request $request, WebsiteLink $websiteLink)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'position' => 'integer|min:0',
        ]);

        $websiteLink->update($request->all());
        return redirect()->route('admin.website_links.index')->with('success', 'Liên kết đã được cập nhật!');
    }

    public function destroy(WebsiteLink $websiteLink)
    {
        $websiteLink->delete();
        return redirect()->route('admin.website_links.index')->with('success', 'Liên kết đã bị xóa!');
    }
}
