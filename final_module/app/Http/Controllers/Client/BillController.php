<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Config;
use App\Models\Category;
use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function create_bill(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'numeric|min:100000000|max:1000000000',
            'address' => 'required|max:255',
        ],
        [
            'phone.numeric' => 'số điện thoại phải là chữ số',
            'phone.min' => 'số điện thoại phải có 10 chữ số ',
            'phone.max' => 'số điện thoại phải có 10 chữ số ',
            'name.required' => 'tên người nhận không được để trống',
            'address.required'=> 'địa chỉ người nhận không được để trống',
        ]);
        // $total = 0;
        $carts = Cart::where('user_id',Session::get('user_id'))->get();
        //     foreach($carts as $cart){
        //         $total += $cart->total;
        //     }
        // $request->merge(['status'=> 1]);
        // $request->merge(['user_id' => Session::get('user_id')]);
        // $request->merge(['total'=> $total]);
        // $request->merge(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        // $bill_id = Bill::insertGetId($request->only('user_id','status','total','name','phone','address','created_at'));
        // foreach($carts as $cart){
        //     $data = array();
        //     $data['bill_id'] = $bill_id;
        //     $data['food_id'] = $cart->food->id;
        //     $data['restaurant_id'] = $cart->food->restaurant_id;
        //     $data['quantity'] = $cart->quantity;
        //     BillDetail::create($data);
        // }
        if(Session::has('user_id')){
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $food = array();
        $check = array();
        for($i= 0;$i<1000000;$i++)
            $check[$i] = 1;
        foreach($carts as $cart){
            $food[$cart->id] = Food::with('restaurant')->where('id',$cart->food_id)->first();
            if($food[$cart->id]->restaurant != null){
                if($food[$cart->id]->restaurant->status == 2){
            $total = 0;
            if($check[$cart->food->restaurant_id] == 1){
                foreach($carts as $value){
                   if($value->food->restaurant_id == $cart->food->restaurant_id ){
                       $total += $value->total; 
                   } 
                }
                $request->merge(['restaurant_id'=> $cart->food->restaurant_id]);
                $request->merge(['status'=> 1]);
                $request->merge(['user_id' => Session::get('user_id')]);
                $request->merge(['total'=> $total]);
                $request->merge(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
                $bill_id = Bill::insertGetId($request->only('user_id','status','restaurant_id','total','name','phone','address','created_at'));
                foreach($carts as $value2){
                    if($value2->food->restaurant_id == $cart->food->restaurant_id ){
                        $data = array();
                        $data['bill_id'] = $bill_id;
                        $data['food_id'] = $value2->food->id;
                        $data['quantity'] = $value2->quantity;
                        BillDetail::create($data);
                    } 
            }
            $check[$cart->food->restaurant_id] = 0;
        }
    }
}
        }
        Cart::where('user_id',Session::get('user_id'))->delete();
        $config = Config::find(1);
        $categories = Category::all();
        return view('Client.Home.success',compact('like','cart_quantity','config','categories'));
    }
}
