<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $rows)
    {
//        dd($rows);
        foreach ($rows as $row)
        {
            Product::create([
                'code' => $row['ma_san_pham'],
                'name' => $row['ten_san_pham'],
                'price' => $row['gia_san_pham'],
                'quantity' => $row['so_luong'],
                'description' => $row['mo_ta'],
                'image' => $row['anh_san_pham'],
                'brand_id' => $row['ma_hang'],
            ]);
        }
    }
}
