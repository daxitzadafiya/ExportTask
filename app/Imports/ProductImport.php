<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        
        $counter = 0;

        foreach ($rows as $row) {

            $counter = $counter + 1;

            if ($counter <= 100) {

                $barcode = Category::inRandomOrder()->first()->code . '00' . $row['Row'] . '00' . $row['Unit Price'] . '00' . $row['Row'];
                $categoryId = Category::inRandomOrder()->first()->id;
                $code = Category::inRandomOrder()->first()->code . '00' . $row['Row'];

                Product::create(['category_id' => $categoryId,
                    'Unit Price' => $row['Unit Price'],
                    'product_type_id' => $row['Row'],
                    'code' => $code,
                    'name' => $row['Item'],
                    'barcode' => $barcode,
                    'has_limit' => $row['Order Quantity'],
                    'note' => $row['Container'],
                ]);
                
            }
        }
    }
}
