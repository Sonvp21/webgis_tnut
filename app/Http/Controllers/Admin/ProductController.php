<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Admin\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Admin\Commune;
use App\Models\Admin\Document;
use App\Models\Admin\Product;
use App\Traits\Filterable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    use Filterable;
    public function index(Request $request)
    {
        $communes = Commune::pluck('name', 'id')->toArray();
        
        // Lấy danh sách giá tiền và trọng lượng duy nhất từ sản phẩm
        $prices = Product::distinct()->pluck('price')->toArray();
        $weights = Product::distinct()->pluck('weight')->toArray();
    
        $query = Product::query();
        $filters = ['commune_id', 'name', 'owner', 'representatives', 'weight', 'price'];
        $query = $this->applyFilters($request, $query, $filters);
    
        // Order by updated_at in descending order
        $products = $query->with('commune')->orderBy('updated_at', 'desc')->paginate(10);
    
        if ($request->ajax()) {
            return view('admin.products.ajax_list', compact('products'))->render();
        }
    
        return view('admin.products.index', compact(
            'products',
            'communes',
            'prices',
            'weights'
        ));
    }

    public function ajaxList(Request $request)
    {
        $query = Product::query();
        $filters = ['commune_id', 'name', 'owner', 'representatives', 'weight', 'price'];
        $query = $this->applyFilters($request, $query, $filters);

        // Order by updated_at in descending order
        $products = $query->with('commune')->orderBy('updated_at', 'desc')->paginate(10);

        return view('admin.products.ajax_list', compact('products'))->render();
    }

    public function create(): View
    {
        $communes = Commune::all();
        return view('admin.products.create', compact('communes'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());

        // Lưu các hình ảnh và tệp đính kèm
        if (!empty($request->input('image_paths'))) {
            $files = json_decode($request->input('image_paths'));
            foreach ($files as $file) {
                $file_name = basename($file);
                $newPath = 'product/images/' . $product->id . '/' . $file_name;
                Storage::disk('public')->move($file, $newPath);
                $product->images()->create([
                    'file_path' => $newPath,
                    'file_name' => $file_name,
                ]);
            }
        }

        if (!empty($request->input('document_paths'))) {
            $files = json_decode($request->input('document_paths'));
            foreach ($files as $file) {
                $file_name = basename($file);
                $newPath = 'product/documents/' . $product->id . '/' . $file_name;
                Storage::disk('public')->move($file, $newPath);
                $product->documents()->create([
                    'file_path' => $newPath,
                    'file_name' => $file_name,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Thêm mới thành công.');
    }

    public function edit(Product $product): View
    {
        $communes = Commune::all();
        return view('admin.products.edit', compact('product', 'communes'));
    }

    public function update(productRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        // Tệp đính kèm mới
        $documentIdNew = array_filter($request->input('document_link', []), 'is_numeric');
        $documentExisId = $product->documents->pluck('id')->toArray();

        // Xóa các document không còn tồn tại
        $idsToDelete = array_diff($documentExisId, $documentIdNew);
        Document::whereIn('id', $idsToDelete)->each(function ($document) {
            Storage::disk('public')->delete($document->file_path);
            $document->delete();
        });

        // Cập nhật đường dẫn document cho các tệp hiện có
        $product->documents->each(function ($document) use ($product) {
            $newPath = 'product/documents/' . $product->id . '/' . basename($document->file_path);
            if ($document->file_path !== $newPath) {
                Storage::disk('public')->move($document->file_path, $newPath);
                $document->update(['file_path' => $newPath]);
            }
        });


        // Xử lý các tệp mới được tải lên
        if (!empty($request->input('document_paths'))) {
            $files = json_decode($request->input('document_paths'));
            $existingDocuments = $product->documents->pluck('file_path')->toArray();

            foreach ($files as $file) {
                // Kiểm tra nếu tệp chưa tồn tại trong danh sách các tệp hiện tại
                if (!in_array($file, $existingDocuments)) {
                    $file_name = basename($file);
                    $newPath = 'product/documents/' . $product->id . '/' . $file_name;
                    Storage::disk('public')->move($file, $newPath);
                    $product->documents()->create([
                        'file_path' => $newPath,
                        'file_name' => $file_name,
                    ]);
                }
            }
        }

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
            $existingImages = $product->images()->pluck('file_path')->toArray();
            $imagesToDelete = array_diff($existingImages, $retainedImages);

            foreach ($imagesToDelete as $imagePath) {
                $image = $product->images()
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
                $newPath = 'product/images/' . $product->id . '/' . $filename;

                // Tạo thư mục nếu chưa tồn tại
                Storage::disk('public')->makeDirectory('product/images/' . $product->id);

                // Di chuyển file từ temp sang thư mục chính thức
                if (Storage::disk('public')->exists($tempPath)) {
                    Storage::disk('public')->move($tempPath, $newPath);

                    // Tạo record trong DB
                    $product->images()->create([
                        'file_path' => $newPath,
                        'file_name' => $filename
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        foreach ($product->documents as $document) {
            Storage::disk('public')->delete($document->file_path);
            $document->delete();
        }

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }
        
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Xoá thành công!');
    }

    public function exportExcel(Request $request)
    {
        $products = json_decode($request->input('products'), true);
        if (!is_array($products) || empty($products)) {
            return back()->with('error', 'Không có dữ liệu để xuất.');
        }
        return Excel::download(new ProductsExport($products), 'products.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $products = json_decode($request->input('products'), true);
        if (!is_array($products) || empty($products)) {
            return back()->with('error', 'Không có dữ liệu để xuất.');
        }
        $pdf = Pdf::loadView('admin.export_pdf.products', compact('products'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function ajaxExport(Request $request)
    {
        $query = Product::query();
        $filters = ['commune_id', 'name', 'owner', 'representatives', 'weight', 'price'];
        $query = $this->applyFilters($request, $query, $filters);

        // Order by updated_at in descending order
        $products = $query->with('commune')->orderBy('updated_at', 'desc')->paginate(10);

        return view('admin.products.ajax_export', compact('products'))->render();
    }

    public function statistical(Request $request)
    {
        $communes = Commune::pluck('name', 'id')->toArray();
        
        // Lấy danh sách giá tiền và trọng lượng duy nhất từ sản phẩm
        $prices = Product::distinct()->pluck('price')->toArray();
        $weights = Product::distinct()->pluck('weight')->toArray();
    
        $query = Product::query();
        $filters = ['commune_id', 'name', 'owner', 'representatives', 'weight', 'price'];
        $query = $this->applyFilters($request, $query, $filters);
    
        // Order by updated_at in descending order
        $products = $query->with('commune')->orderBy('updated_at', 'desc')->paginate(10);
    
        if ($request->ajax()) {
            return view('admin.products.ajax_list', compact('products'))->render();
        }
    
        return view('admin.products.statistical', compact(
            'products',
            'communes',
            'prices',
            'weights'
        ));
    }    
}
