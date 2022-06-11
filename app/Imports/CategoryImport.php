<?php

namespace App\Imports;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        $counter = 0;

        foreach ($rows as $row) {

            $counter = $counter + 1;

            if ($counter <= 100) {

                $code = Str::random(4) . '00' . $row['Row'];

                Category::create([
                    'code' => $code,
                    'name' => $row['Category'],
                    'note' => $row['Container']
                ]);

            }
        }
    }
}
