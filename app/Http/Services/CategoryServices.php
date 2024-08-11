<?php

namespace App\Http\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryServices
{
    public function store(CategoryRequest $request)
    {
        Category::create([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);
    }
}
