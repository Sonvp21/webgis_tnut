<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin\Commune;
use App\Models\Admin\District;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Traits\Filterable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProductController extends Controller
{
    // use Filterable;

    // Hiển thị tất cả sản phẩm
    public function allProduct(): View
    {
        $products = Product::latest('created_at')->paginate(12);

        foreach ($products as $product) {
            $imagePath = public_path("storage/product/images/{$product->id}");
            $files = File::exists($imagePath) ? File::files($imagePath) : [];

            $product->image_url = count($files) > 0
                ? asset("storage/product/images/{$product->id}/" . $files[0]->getFilename())
                : 'https://via.placeholder.com/150';
        }

        return view('web.products.index', compact('products'));
    }

    // Hiển thị chi tiết sản phẩm
    public function show($slug): View
    {
        $product = Product::where('slug', $slug)->firstOrFail();
    
        $imagePath = public_path("storage/product/images/{$product->id}");
        $files = File::exists($imagePath) ? File::files($imagePath) : [];
    
        $imageUrls = count($files) > 0
            ? array_map(fn($file) => asset("storage/product/images/{$product->id}/" . $file->getFilename()), $files)
            : ['https://via.placeholder.com/150'];
    
        return view('web.products.show', compact('product', 'imageUrls'));
    }    

    // public function search(Request $request)
    // {
    //     $districts = District::pluck('name', 'id')->toArray();
    //     $communes = Commune::pluck('name', 'id')->toArray();

    //     $query = Product::query();
    //     $filters = ['district_id', 'commune_id', 'name', 'owner', 'representatives'];
    //     $query = $this->applyFilters($request, $query, $filters);

    //     // Order by updated_at in descending order
    //     $products = $query->with('commune.district')->orderBy('updated_at', 'desc')->paginate(10);

    //     if ($request->ajax()) {
    //         return view('web.searchs.products.ajax_list', compact('products'))->render();
    //     }

    //     return view('web.searchs.products.index', compact(
    //         'products',
    //         'districts',
    //         'communes'
    //     ));
    // }

    // public function ajaxList(Request $request)
    // {
    //     $query = Product::query();
    //     $filters = ['district_id', 'commune_id', 'name', 'owner', 'representatives'];
    //     $query = $this->applyFilters($request, $query, $filters);

    //     // Order by updated_at in descending order
    //     $products = $query->with('commune.district')->orderBy('updated_at', 'desc')->paginate(10);

    //     return view('web.searchs.products.ajax_list', compact('products'))->render();
    // }
}
