<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductImportSample implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return new Collection([[
            'Mã sản phẩm',
            'Tên sản phẩm',
            'Giá sản phẩm',
            'Số lượng',
            'Mô tả',
            'Ảnh sản phẩm',
            'Mã hãng',
        ]]);
    }
}
