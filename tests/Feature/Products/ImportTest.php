<?php

namespace Tests\Feature\Products;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImportTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanImportProducts()
    {
        $importFile = $this->getUploadedFile('products-import-file.xlsx');

        $response = $this->post($this->getRoute(), ['importFile' => $importFile]);

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('message');
        $this->assertDatabaseHas('products', [
            'code' => '987096'
        ]);
    }

    public function testItCannotImportProductsDueValidationErrors()
    {
        factory(Product::class)->create(['code' => '456791']);
        $importFile = $this->getUploadedFile('products-not-validates-import-file.xlsx');

        $response = $this->post($this->getRoute(), ['importFile' => $importFile]);

        $response->assertSessionHasErrors();
        $this->assertDatabaseCount('products', 1);
    }

    private function getRoute(): string
    {
        return route('products.import');
    }

    private function getUploadedFile(string $fileName): UploadedFile
    {
        $filePath = base_path('tests/stubs/' . $fileName);
        return new UploadedFile($filePath, 'products-import-file.xlsx', null, null, true);
    }
}
