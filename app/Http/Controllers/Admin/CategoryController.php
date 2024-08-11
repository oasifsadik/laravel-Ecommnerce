<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryServices;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $categoryServices;
    protected $routeAndView = 'category';

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function index()
    {
        $categories = Category::latest()->get();
        // $categories = Cache::remember('random_products', 60, function () {
        //     return Category::inRandomOrder()->limit(10)->get();
        // });
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route("{$this->routeAndView}.index")->with('message' ,'Data Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $this->categoryServices->update($request, $id);
        return redirect()->route("{$this->routeAndView}.index")->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $productsCount = $category->product()->count();

        if ($productsCount > 0) {
            return back()->with('error', 'Cannot delete category. It still has associated products.');
        }

        $category->delete();
        return redirect()->back()->with('error','Data Delete Successfully');
    }
}
