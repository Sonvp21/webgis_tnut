<?php

namespace App\Exports\Admin;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    protected $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function collection()
    {
        // Chuyển đổi dữ liệu từ mảng products thành collection để export
        $data = [];

        foreach ($this->products as $product) {
            $data[] = [
                'Xã' => $product['commune_name'] ?? null,
                'Tên sản phẩm' => $product['name'] ?? null,
                'Chủ sở hữu' => $product['owner'] ?? null,
                'Đại diện pháp luật' => $product['representatives'] ?? null,
                'Địa chỉ' => $product['address'] ?? null,
                'Mô tả' => $product['content'] ?? null,
                'Trọng lượng (Kg)' => $product['weight'] ?? null,
                'Giá (VNĐ)' => $product['price'] ?? null,
            ];
        }

        return new Collection($data);
    }

    public function headings(): array
    {
        return [
            'Xã',
            'Tên sản phẩm',
            'Chủ sở hữu',
            'Đại diện pháp luật',
            'Địa chỉ',
            'Mô tả',
            'Trọng lượng (Kg)',
            'Giá (VNĐ)',
        ];
    }
}
