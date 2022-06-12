<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\FileOperationsHelper;
use App\Models\Category;

class ProductController extends Controller
{
    public function store()
    {
        try {
            $file = public_path('/csv/SuperstoreSalesTraining.csv');

            $Products = FileOperationsHelper::csvToArray($file);

            for ($i = 0; $i < 100; $i++) {

                $row = $Products[$i];

                $categoryData = Category::findCateoryData($row['Category']);

                if (!empty($categoryData)) {
                    $categoryId = $categoryData->id;
                    $code = $categoryData->code . '00' . $row['Row'];

                    $barcode = $code . '00' . $row['Unit Price'] . '00' . $row['Row'];

                    Product::create([
                        'category_id' => $categoryId,
                        'code' => $code,
                        'name' => $row['Customer Name'],
                        'barcode' => $barcode,
                        'note' => $row['Container'],
                    ]);


                    return redirect()->back()->with(['success' => true, 'message' => "Products has been imported sucessfully from the local CSV file"]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => false, 'message' => "Something went wrong"]);
        }
    }
}
