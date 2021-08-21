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
        $carts = Cart::with('food','user')->where('user_id',Session::get('user_id'))->get();
        return view('Client.Home.cart',compact('categories', 'config', 'carts'));
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
        foreach($carts as $cart){
            if($request->food_id == $cart->food_id){
                return Response()->json(['message' => 'sản phẩm đã có trong giỏ hàng','data'=>count($carts)]);
                $flag = 1;
            }
        }
        if($flag == 0){
            $food = Food::where('id',$request->food_id)->first();
            if($food->price_discount > 0){
                $total = $food->price_discount;
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
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            return Response()->json(['message' => 'Thêm vào giỏ hàng thành công','data'=>count($carts)]);
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
