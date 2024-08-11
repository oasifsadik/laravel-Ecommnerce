<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function page()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $categories = Category::get();
            $cartProducts = Cart::content();
            // dd($cartProducts);
            return view('website.cart.checkout',compact('cartProducts','categories','user'));
        } else {
            return redirect(route('login'))->with('error', 'Please log in first');
        }

    }

    public function process(Request $request)
    {
        $request->validate([
            'country' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state_county' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'payment_method' => 'required|string'
        ]);

        // Get the authenticated user
        $user = Auth::user();
        $user->update([
            'country' => $request->input('country'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_name' => $request->input('company_name'),
            'address' => $request->input('address'),
            'street_address' => $request->input('street_address'),
            'city' => $request->input('city'),
            'state_county' => $request->input('state_county'),
            'postcode' => $request->input('postcode'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);
        $order = new Order([
            'user_id' => $user->id,
            'country' => $request->input('country'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'company_name' => $request->input('company_name'),
            'address' => $request->input('address'),
            'street_address' => $request->input('street_address'),
            'city' => $request->input('city'),
            'state_county' => $request->input('state_county'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('phone'),
            'payment_method' => $request->input('payment_method'),
            'status' => 'Pending',
            'tracking_no' => Auth::user()->first_name . rand(1111,0000),
        ]);

        $subtotalFormatted = Cart::priceTotal();
        $subtotal = floatval(str_replace(',', '', $subtotalFormatted));
        $order->total_price = $subtotal;
        if ($order->payment_method === 'cod') {
            $deliveryCharge = 100;
            if (is_numeric($order->total_price)) {
                $order->total_price += $deliveryCharge;
            } else {
                Log::error('Total price is not numeric: ' . $order->total_price);
            }
        }
        $order->save();

        foreach (Cart::content() as $cartItem) {
            $order->items()->create([
                'product_id' => $cartItem->id,
                'product_name' => $cartItem->name,
                'quantity' => $cartItem->qty,
                'price' => $cartItem->price,
                'total' => $cartItem->qty * $cartItem->price
            ]);
            $product = Product::findOrFail($cartItem->id);
            $product->product_quantity -= $cartItem->qty;
            $product->save();
        }
        Cart::destroy();
        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }

}
