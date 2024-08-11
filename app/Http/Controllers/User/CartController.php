<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (Auth::check())
        {
            $product = Product::find($request->product_id);
            $size = $request->input('size', null);
            $color = $request->input('color', null);
            $cartItem = [
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 550,
                'options' => [
                    'size' => $size,
                    'color' => $color,
                    'thumbnail' => $product->thumbnail,
                ]
            ];
            Cart::add($cartItem);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else
        {
            return redirect(route('login'))->with('error', 'Please log in first');
        }
    }

    public function index(){
        if (!Auth::check()) {
            return redirect(route('login'))->with('success', 'Please log in first');
        } else {
            $categories = Category::get();
            $cartProducts = Cart::content();
            // dd($cartProducts);
            return view('website.cart.cart',compact('categories','cartProducts'));
        }

    }
    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}
