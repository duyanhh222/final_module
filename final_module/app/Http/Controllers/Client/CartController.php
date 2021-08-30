<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Config;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Use_address;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = array();
        $address = Use_address::where('user_id',Session::get('user_id'))->get();
        $config = Config::find(1);
        $categories = Category::all();
        $cart_quantity = 0;
        $carts = Cart::with('food','user')->where('user_id',Session::get('user_id'))->get();
        foreach($carts as $cart){
            $cart_quantity += $cart->quantity;
        }
        $check = array();
        for($i= 0;$i<1000000;$i++)
            $check[$i] = 1;
        $data = array();
        $name = array();
        foreach($carts as $cart){
            $food[$cart->id] = Food::with('restaurant')->where('id',$cart->food_id)->first();
            $total = 0;
            if($check[$cart->food->restaurant_id] == 1){
                foreach($carts as $value){
                   if($value->food->restaurant_id == $cart->food->restaurant_id ){
                       $total += $value->total; 
                   } 
                }
                $data[$cart->food->restaurant_id] = $total;
                $restaurant_name = Restaurant::where('id',$cart->food->restaurant_id)->first();
                $name[$cart->food->restaurant_id] = $restaurant_name->name;
                $check[$cart->food->restaurant_id] = 0;
            }
        }
        
        return view('Client.Home.cart',compact('categories', 'config', 'carts','cart_quantity','data','name','address','food'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $carts = Cart::with(['food'])->where('user_id',Session::get('user_id'))->get();
        $flag = 0;
        $quantity = 0;
        $cart_quantity = 0;
        foreach($carts as $cart){
            $cart_quantity += $cart->quantity;
        }
        foreach($carts as $cart){
            if($request->food_id == $cart->food_id){
                $quantity = $cart->quantity + 1;
                if($cart->food->price_discount == 0)
                {
                    $total = $cart->total + $cart->food->price;
                }             
                else{
                    $total = $cart->total + $cart->food->price_discount;
                } 
                Cart::where('user_id',Session::get('user_id'))->where('food_id',$cart->food_id)->update(['quantity' => $quantity]);
                Cart::where('user_id',Session::get('user_id'))->where('food_id',$cart->food_id)->update(['total' => $total]);

                $cart_quantity += 1;
                return Response()->json(['message' => 'Thêm vào giỏ hàng thành công','data'=>$cart_quantity]);
                $flag = 1;
            }
        }
        if($flag == 0){
            $food = Food::where('id',$request->food_id)->first();
            if($food->price_discount > 0){
                $total = $food->price_discount ;
            }
            else{
                $total = $food->price;
            }
            $data = array();
            $data['food_id'] = $request->food_id;
            $data['user_id'] = $request->user_id;
            $data['quantity']    = 1;
            $data['total'] = $total;
            Cart::create($data);
            $cart_quantity += 1;
            return Response()->json(['message' => 'Thêm vào giỏ hàng thành công','data'=>$cart_quantity]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array();
        $carts = Cart::where('user_id',Session::get('user_id'))->get();
        foreach($carts as $cart)
        {
            $data[$cart->id] = Food::with('restaurant')->where('id',$cart->food_id)->first();
            if($data[$cart->id]->restaurant->status == 2){
            $food = Food::where('id',$cart->food_id)->first();
            if($food->price_discount == 0){
                $total = (int)$request->num[$cart->id] * $food->price;
            }
            else{
                 $total = (int)$request->num[$cart->id] * $food->price_discount;
            }
            $request->merge(['total' => $total]);
            $request->merge(['quantity' => (int)$request->num[$cart->id]]);
            Cart::where('id',$cart->id)->update($request->only('total','quantity'));
        }
        }
        return redirect()->route('show.cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('show.cart');
    }
}
