<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $categories = Category::with('product')->inRandomOrder()->take(2)->get();
        $products = Product::inRandomOrder()->paginate(50);
        return view('website.home',compact('categories','products'));
    }

    public function singleProduct($id){
        $categories = Category::get();
        $product = Product::with('images')->find($id);
        $relatedProducts = Product::where('cat_id', $product->cat_id)
                              ->where('id', '!=', $id)
                              ->with('images')
                              ->take(15)
                              ->get();
        return view('website.singleProduct',compact('product','categories','relatedProducts'));
    }
}
