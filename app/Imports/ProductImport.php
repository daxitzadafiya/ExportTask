<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $barcode = Category::inRandomOrder()->first()->code . '00' . $row['product_id'] . '00' . $row['unit_id'] . '00' . $row['product_type_id'];
        $categoryId = Category::inRandomOrder()->first()->id;
        $code = Category::inRandomOrder()->first()->code . '00' . $row['product_id'];
        
        return new Product([
            'category_id' => $categoryId,
            'unit_id' => $row['unit_id'],
            'product_type_id' => $row['product_type_id'],
            'code' => $code,
            'name' => $row['name'],
            'barcode' => $barcode,
            'has_limit' => $row['has_limit'],
            'note' => $row['note'],
        ]);
    }
}
