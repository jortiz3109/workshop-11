<?php

namespace Tests\Feature\Products;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanStoreAProduct()
    {
        $this->withoutExceptionHandling();
        $product = factory(Product::class)->make();

        $response = $this->post($this->route(), $product->toArray());

        $response->assertRedirect();
        $this->assertDatabaseHas('products', $product->toArray());
    }

    private function route(): string
    {
        return route('products.store');
    }
}
