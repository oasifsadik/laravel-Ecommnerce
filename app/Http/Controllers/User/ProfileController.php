<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        $categories = Category::get();

        return view('website.profile.index',compact('categories'));
    }

    public function userOrder($id){
        $categories = Category::get();
        $userOrders = Order::where('user_id', $id)
                       ->whereNotIn('status', ['Delivered'])
                       ->paginate(5);
        return view('website.profile.userOrder',compact('userOrders','categories'));
    }
    public function userOrderDeliver($id){
        $categories = Category::get();
        $userOrders = Order::where('user_id', $id)
                       ->where('status','Delivered')
                       ->paginate(5);
        return view('website.profile.userOrder',compact('userOrders','categories'));
    }
}
