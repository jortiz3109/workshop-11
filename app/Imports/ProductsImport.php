<?php

namespace App\Imports;

use App\Concerns\HasProductValidationRules;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    use HasProductValidationRules;

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'code' => $row['code'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'description' => $row['description'],
        ]);
    }
}
