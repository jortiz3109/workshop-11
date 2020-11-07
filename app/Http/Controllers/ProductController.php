<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\ImportRequest;
use App\Http\Requests\StoreProductRequest;
use App\Imports\ProductsImport;
use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create', ['product' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');

        $product->save();

        return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function import(ImportRequest $request): RedirectResponse
    {
        $import = new ProductsImport();
        $import->import($request->file('importFile'));
        $importedProducts = $import->toArray($request->file('importFile'));

        return redirect()->route('products.index')->with('message', trans('products.messages.imported', ['count' => count($importedProducts)]));
    }
}
