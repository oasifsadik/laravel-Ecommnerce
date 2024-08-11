<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','Pending')->paginate(20);
        return view('admin.orders.order', compact('orders'));
    }

    public function ordersDetails($id)
    {
        $orderDetails = Order::with('items')->find($id);
        return view('admin.orders.orderDetails',compact('orderDetails'));
    }

    public function confirmOrder($id)
    {
        $confirmOrder = Order::find($id);
        if($confirmOrder)
        {
            $confirmOrder->status = 'Order Confirmed';
            $confirmOrder->save();
            return redirect()->route('admin.orders')->with('message','this Order Was Confirmed.');
        }
    }

    public function confirmOrderList()
    {
        $confirmList = Order::where('status','Order Confirmed')->get();
        return view('admin.orders.confirmOrder',compact('confirmList'));
    }
}
