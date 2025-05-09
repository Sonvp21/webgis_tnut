<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::with('images')->latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $banner = Banner::create(); // Tạo banner mới

        $imagePaths = $request->input('image_paths');
        if ($imagePaths) {
            $files = json_decode($imagePaths, true);
            if (is_array($files)) {
                foreach ($files as $file) {
                    $fileName = basename($file);
                    $newPath = "banners/{$banner->id}/{$fileName}";
                    Storage::disk('public')->move($file, $newPath);
                    $banner->images()->create([
                        'file_path' => $newPath,
                        'file_name' => $fileName,
                    ]);
                }
            }
        }

        return redirect()->route('admin.banners.index')->with('success', 'Thêm banner thành công');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        // Xử lý ảnh nếu có thay đổi
        if ($request->filled('retained_images') || $request->filled('new_images')) {
            $retainedImages = $request->filled('retained_images')
                ? json_decode($request->input('retained_images'), true)
                : [];

            $newImages = $request->filled('new_images')
                ? json_decode($request->input('new_images'), true)
                : [];

            // Xóa ảnh cũ không được giữ lại
            $existingImages = $banner->images()->pluck('file_path')->toArray();
            $imagesToDelete = array_diff($existingImages, $retainedImages);
            foreach ($imagesToDelete as $imagePath) {
                $image = $banner->images()->where('file_path', $imagePath)->first();
                if ($image) {
                    Storage::disk('public')->delete($image->file_path);
                    $image->delete();
                }
            }

            // Thêm ảnh mới
            foreach ($newImages as $tempPath) {
                $filename = basename($tempPath);
                $newPath = 'banners/' . $banner->id . '/' . $filename;

                Storage::disk('public')->makeDirectory('banners/' . $banner->id);
                if (Storage::disk('public')->exists($tempPath)) {
                    Storage::disk('public')->move($tempPath, $newPath);
                    $banner->images()->create([
                        'file_path' => $newPath,
                        'file_name' => $filename
                    ]);
                }
            }
        }

        return redirect()->route('admin.banners.index')->with('success', 'Cập nhật banner thành công');
    }

    public function destroy(Banner $banner)
    {
        foreach ($banner->images as $image) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }

        Storage::disk('public')->deleteDirectory("banners/{$banner->id}");

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Xóa banner thành công');
    }
}
