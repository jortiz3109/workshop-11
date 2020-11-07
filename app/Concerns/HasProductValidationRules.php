<?php


namespace App\Concerns;


trait HasProductValidationRules
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'code' => 'required|numeric|unique:products,code',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
        ];
    }
}
