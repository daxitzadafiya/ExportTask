<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $code = Str::random(4) . '00' . $row['id'];

        return new Category([
            'code' => $code,
            'name' => $row['name'],
            'note' => $row['note']
        ]);
    }
}
