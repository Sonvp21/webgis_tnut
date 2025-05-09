<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;
use App\Models\Admin\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(VideoRequest $request)
    {
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();

        // Tạo bản ghi Video trước để lấy ID
        $video = Video::create([
            'file_path'      => '', // Tạm thời để trống
            'file_name'      => $originalName,
            'published_at'   => $request->published_at,
            'videoable_id'   => 0, // Nếu không liên kết model khác
            'videoable_type' => 'App\Models\Admin\Video',
        ]);

        // Cập nhật lại file_path với ID video
        $path = "videos/{$video->id}/{$originalName}";
        $file->storeAs("public/{$path}");

        // Cập nhật lại đường dẫn trong database
        $video->update(['file_path' => $path]);

        return redirect()->route('admin.videos.index')->with('success', 'Video đã được tải lên.');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(VideoRequest $request, Video $video)
    {
        if ($request->hasFile('file')) {
            // Xóa file cũ nếu tồn tại
            if ($video->file_path && Storage::disk('public')->exists($video->file_path)) {
                Storage::disk('public')->delete($video->file_path);
            }

            // Lưu file mới
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $newPath = "videos/{$video->id}/{$originalName}";

            $file->storeAs("public/{$newPath}");

            // Cập nhật thông tin video
            $video->update([
                'file_path'    => $newPath,
                'file_name'    => $originalName,
                'published_at' => $request->published_at,
            ]);
        } else {
            // Chỉ cập nhật thông tin khác nếu không có file mới
            $video->update($request->only('published_at'));
        }

        return redirect()->route('admin.videos.index')->with('success', 'Video đã được cập nhật.');
    }

    public function destroy(Video $video)
    {
        $directory = "videos/{$video->id}";

        // Xóa toàn bộ thư mục chứa video
        if (Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->deleteDirectory($directory);
        }

        // Xóa video khỏi database
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video đã được xóa.');
    }
}
