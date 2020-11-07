<?php

namespace App;

use App\Decorators\PriceFormatterContract;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'code', 'price', 'stock', 'description'
    ];

    public function getFormattedPrice(): string
    {
        $formatter = resolve(PriceFormatterContract::class);

        return $formatter->format($this->price);
    }
}
