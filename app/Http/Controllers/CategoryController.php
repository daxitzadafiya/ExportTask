<?php

namespace App\Http\Controllers;

use App\Imports\CategoryImport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Excel;

class CategoryController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('import-data');
    }


    public function store(Request $request)
    {
        if ($request->file('category_csv')) {
            $file = $request->file('category_csv');
            $extension = $file->getClientOriginalExtension();
            Excel::import(new CategoryImport, $request->file('category_csv'));
            echo "Category Data Successfully Added";
        } else {
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
