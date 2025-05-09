<?php

namespace App\Http\Controllers\Admin\FilePond;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilePondController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('document_link')) {
            $file = $request->file('document_link');
            // trong trường họp nhiều ảnh
            $data = $file[0];
            $userId = Auth::id();
            $path = "temp/{$userId}/filepond/{$data->getClientOriginalName()}";

            Storage::disk('public')->put($path, file_get_contents($data));
            return response()->json(['path' => $path]);
        }

        if ($request->hasFile('image_link')) {
            $file = $request->file('image_link');
            // trong trường họp nhiều ảnh
            $data = $file[0];
            $userId = Auth::id();
            $path = "temp/{$userId}/filepond/{$data->getClientOriginalName()}";

            Storage::disk('public')->put($path, file_get_contents($data));
            return response()->json(['path' => $path]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
    public function load($directory, $filename)
    {
        $fullPath = storage_path("app/public/{$directory}/{$filename}");

        if (file_exists($fullPath)) {
            return response()->file($fullPath);
        }

        return response()->json(['error' => 'File not found'], 404);
    }

    public function revert(Request $request)
    {
        $path = $request->input('path');
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => 'File not found'], 404);
    }
}
