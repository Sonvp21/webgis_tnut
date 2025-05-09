<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductionFacilityRequest;
use App\Models\Admin\ProductionFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductionFacilityController extends Controller
{
    public function index()
    {
        $facilities = ProductionFacility::latest()->paginate(10);
        return view('admin.production_facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.production_facilities.create');
    }

    public function store(ProductionFacilityRequest $request)
    {
        $validated = $request->validated();

        $productionFacility = ProductionFacility::create($validated);
        // Kiểm tra nếu có ảnh thì xử lý
        $imagePaths = $request->input('image_paths');
        if ($imagePaths) {
            $files = json_decode($imagePaths, true); // Chuyển thành mảng
            if (json_last_error() === JSON_ERROR_NONE && is_array($files)) {
                foreach ($files as $file) {
                    $file_name = basename($file);
                    $newPath = "production_facilities/images/{$productionFacility->id}/{$file_name}";
                    Storage::disk('public')->move($file, $newPath);
                    $productionFacility->images()->create([
                        'file_path' => $newPath,
                        'file_name' => $file_name,
                    ]);
                }
            }
        }
        // Cập nhật tọa độ
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $productionFacility->updateCoordinates($productionFacility->id, $longitude, $latitude);

        return redirect()->route('admin.production_facilities.index')->with('success', 'Cơ sở sản xuất đã được thêm.');
    }


    public function edit(ProductionFacility $productionFacility)
    {
        return view('admin.production_facilities.edit', compact('productionFacility'));
    }

    public function update(ProductionFacilityRequest $request, ProductionFacility $productionFacility)
    {
        $validatedData = $request->validated();
        $productionFacility->update($validatedData);

        // Xử lý ảnh nếu có thay đổi
        if ($request->filled('retained_images') || $request->filled('new_images')) {
            // Lấy danh sách ảnh được giữ lại
            $retainedImages = $request->filled('retained_images')
                ? json_decode($request->input('retained_images'), true)
                : [];

            // Lấy danh sách ảnh mới
            $newImages = $request->filled('new_images')
                ? json_decode($request->input('new_images'), true)
                : [];

            // 1. Xử lý xóa ảnh
            $existingImages = $productionFacility->images()->pluck('file_path')->toArray();
            $imagesToDelete = array_diff($existingImages, $retainedImages);

            foreach ($imagesToDelete as $imagePath) {
                $image = $productionFacility->images()
                    ->where('file_path', $imagePath)
                    ->first();

                if ($image) {
                    Storage::disk('public')->delete($image->file_path);
                    $image->delete();
                }
            }

            // 2. Xử lý thêm ảnh mới
            foreach ($newImages as $tempPath) {
                $filename = basename($tempPath);
                $newPath = 'production_facilities/images/' . $productionFacility->id . '/' . $filename;

                // Tạo thư mục nếu chưa tồn tại
                Storage::disk('public')->makeDirectory('production_facilities/images/' . $productionFacility->id);

                // Di chuyển file từ temp sang thư mục chính thức
                if (Storage::disk('public')->exists($tempPath)) {
                    Storage::disk('public')->move($tempPath, $newPath);

                    // Tạo record trong DB
                    $productionFacility->images()->create([
                        'file_path' => $newPath,
                        'file_name' => $filename
                    ]);
                }
            }
        }

        // Cập nhật tọa độ
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $productionFacility->updateCoordinates($productionFacility->id, $longitude, $latitude);

        return redirect()->route('admin.production_facilities.index')->with('success', 'Cập nhật thành công.');
    }


    public function destroy(ProductionFacility $productionFacility)
    {
        $productionFacilityId = $productionFacility->id;
        foreach ($productionFacility->images as $image) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }

        // Xóa thư mục chứa hình ảnh
        $directoryPath = "productionFacility/images/{$productionFacilityId}"; // Đường dẫn thư mục tương ứng với ID
        Storage::disk('public')->deleteDirectory($directoryPath); // Xóa thư mục

        $productionFacility->delete();
        return redirect()->route('admin.production_facilities.index')->with('success', 'Đã xóa thành công.');
    }
}
