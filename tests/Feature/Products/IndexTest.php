<?php

namespace Tests\Feature\Products;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function testItHasAProductList()
    {
        factory(Product::class, 1)->create();

        $response = $this->get(route('products.index'));

        $response->assertOk();
        $response->assertSee(trans('products.titles.index'));
    }

    public function testItHasAProductsInformation()
    {
       $products = factory(Product::class, 3)->create();

        $response = $this->get(route('products.index'));

        $response->assertSee($products->random()->first()->name);
    }

    public function testItPaginatesTheProducts()
    {
        factory(Product::class, 16)->create();
        $product = factory(Product::class )->create();

        $responseFirstPage = $this->get(route('products.index'));
        $responseSecondPage = $this->get(route('products.index', ['page' => 2]));

        $responseFirstPage->assertDontSee($product->code);
        $responseSecondPage->assertSee($product->code);

    }
}
