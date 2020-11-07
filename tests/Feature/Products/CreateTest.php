<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testItHasCorrectView()
    {
        $this->get($this->getRoute())->assertViewIs('products.create');
    }

    public function testItHasAForm()
    {
        $response = $this->get($this->getRoute());

        foreach (trans('products.fields') as $field => $value) {
            $response->assertSee($value);
        }
    }

    private function getRoute(): string
    {
        return route('products.create');
    }
}
