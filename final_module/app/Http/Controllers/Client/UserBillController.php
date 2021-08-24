<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Config;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserBillController extends Controller
{
    public function index()
    {
        if(Session::has('user_id')){
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $carts = Cart::where('user_id',Session::get('user_id'))->get();
        $categories = Category::all();
        $config = Config::find(1);
        $id = Session::get('user_id');
        $bills = Bill::where('user_id', $id)->get();
        return view('Client.Bill.bill',  compact('bills', 'config', 'cart_quantity', 'categories', 'carts'));
    }

    public function detail($id)
    {
        if(Session::has('user_id')){
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $carts = Cart::where('user_id',Session::get('user_id'))->get();
        $categories = Category::all();
        $config = Config::find(1);
        $bill = Bill::findOrFail($id);
        $bill_detail_food = BillDetail::where('bill_id', $id)->get();
        return view('Client.Bill.billdetail', compact('bill', 'cart_quantity', 'bill_detail_food' , 'config', 'categories', 'carts'));
    }
}
