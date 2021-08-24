<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Config;
use App\Models\Food;
use Illuminate\Http\Request;
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
        $config = Config::find(1);
        $categories = Category::all();
        $cart_quantity = 0;
        $carts = Cart::with('food','user')->where('user_id',Session::get('user_id'))->get();
        foreach($carts as $cart){
            $cart_quantity += $cart->quantity;
        }
        return view('Client.Home.cart',compact('categories', 'config', 'carts','cart_quantity'));
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
       
       
        $carts = Cart::where('user_id',Session::get('user_id'))->get();
        $flag = 0;
        $quantity = 0;
        $cart_quantity = 0;
        foreach($carts as $cart){
            $cart_quantity += $cart->quantity;
        }
        foreach($carts as $cart){
            if($request->food_id == $cart->food_id){
                $quantity = $cart->quantity + 1;
                Cart::where('user_id',Session::get('user_id'))->where('food_id',$cart->food_id)->update(['quantity' => $quantity]);
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
        $carts = Cart::where('user_id',Session::get('user_id'))->get();
        foreach($carts as $cart)
        {
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
