<?php

namespace App\Http\Controllers;

use App\Helpers\FileOperationsHelper;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function create()
    {
        return view('import-data');
    }

    public function store()
    {

        try {
            $file = public_path('/csv/SuperstoreSalesTraining.csv');

            $categories = FileOperationsHelper::csvToArray($file);

            for ($i = 0; $i <= 100; $i++) {

                $row = $categories[$i];

                $code = Str::random(4) . '00' . $row['Row'];

                Category::insertOrIgnore([
                    'code' => $code,
                    'name' => $row['Category'],
                    'note' => $row['Container']
                ]);
            }

            return redirect()->back()->with(['success' => true, 'message' => "Categories has been imported sucessfully from the local CSV file"]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => false, 'message' => "Something went wrong"]);
        }
    }
}
