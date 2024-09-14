<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    public function orderHistory(Request $request)
{
    $query = Order::query();

    if ($request->has('search') && !empty($request->search)) {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('id', 'like', "%{$searchTerm}%")
              ->orWhere(DB::raw('CONCAT(first_name, " ", last_name)'), 'like', "%{$searchTerm}%");
        });
    }

    if ($request->has('status') && !empty($request->status)) {
        $query->where('status', $request->status);
    }

    $orders = $query->paginate(10);

    return view('admin.orders.orderHistory', compact('orders'));
}



}
