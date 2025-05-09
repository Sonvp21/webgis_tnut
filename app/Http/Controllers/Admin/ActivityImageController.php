<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ActivityImage;
use App\Models\Admin\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ActivityImageController extends Controller
{
    public function index()
    {
        // Lấy danh sách ActivityImage và kèm theo hình ảnh
        $activityImages = ActivityImage::with('images')->latest()->get();

        return view('admin.activity_images.index', compact('activityImages'));
    }


    public function create(): View
    {
        return view('admin.activity_images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_paths' => 'required|json', // Danh sách đường dẫn ảnh
            'title'       => 'required|string|max:255', // Tiêu đề hoạt động
        ]);

        // Tạo mới hoạt động kèm tiêu đề
        $activityImage = ActivityImage::create([
            'title' => $validated['title']
        ]);

        // Kiểm tra nếu có ảnh thì xử lý
        $imagePaths = $request->input('image_paths');
        if ($imagePaths) {
            $files = json_decode($imagePaths, true); // Chuyển thành mảng
            if (json_last_error() === JSON_ERROR_NONE && is_array($files)) {
                foreach ($files as $file) {
                    $file_name = basename($file);
                    $newPath = "image_activity/{$activityImage->id}/{$file_name}";

                    // Di chuyển ảnh từ file tạm sang thư mục chính
                    Storage::disk('public')->move($file, $newPath);

                    // Lưu vào bảng images
                    $image = $activityImage->images()->create([
                        'file_path'      => $newPath,
                        'file_name'      => $file_name,
                        'imageable_type' => ActivityImage::class,
                        'imageable_id'   => $activityImage->id,
                    ]);
                }
            }
        }

        return redirect()->route('admin.activity_images.index')->with('success', 'Thêm ảnh thành công');
    }

    public function edit(ActivityImage $activityImage)
    {
        return response()->json(Cache::remember("activity_image_{$activityImage->id}", 60, function () use ($activityImage) {
            return $activityImage->load('images');
        }));
    }

    public function update(Request $request, ActivityImage $activityImage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        $activityImage->update(['title' => $validated['title']]);
    
        return response()->json(['success' => true, 'message' => 'Cập nhật tiêu đề thành công!']);
    }
    

    public function destroy(Request $request): RedirectResponse
    {
        $imageIds = $request->input('image_ids', []);

        // Chuyển đổi thành mảng số nguyên
        $imageIds = array_map('intval', is_array($imageIds) ? $imageIds : explode(',', $imageIds));

        if (empty($imageIds)) {
            return redirect()->route('admin.activity_images.index')->with('error', 'Không có ảnh nào được chọn.');
        }

        $images = Image::whereIn('id', $imageIds)->get();

        foreach ($images as $img) {
            if (!empty($img->file_path) && Storage::disk('public')->exists($img->file_path)) {
                Storage::disk('public')->delete($img->file_path);
            }
            $img->delete();
        }
        return redirect()->route('admin.activity_images.index')->with('success', 'Xóa ảnh thành công.');
    }
}
