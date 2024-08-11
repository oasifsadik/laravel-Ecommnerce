<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductsRequest;
use App\Http\Services\ProductsServices;

class ProductController extends Controller
{
    protected $productsServices;
    protected $routeAndView = 'products';
    public function __construct(ProductsServices $productsServices)
    {
        $this->productsServices = $productsServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request)
    {
        $this->productsServices->storeProduct($request);
        return redirect()->back()->with('message','Data Store Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, string $id): RedirectResponse
     {
        $product = $this->productsServices->updateProduct($request, $id);
        // dd($product);
        if (!$product) {
            return redirect()->route("{$this->routeAndView}.index")
                ->with('error', 'Product not found or update failed.');
        }

        return redirect()->route("{$this->routeAndView}.index")
            ->with('message', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->productsServices->deleteProduct($id);

        if ($deleted) {
            return redirect()->route('products.index')->with('message', 'Product and associated images deleted successfully.');
        } else {
            return redirect()->route('products.index')->with('error', 'Failed to delete product.');
        }
    }
}
