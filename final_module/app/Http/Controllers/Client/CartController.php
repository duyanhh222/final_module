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
        $request->merge(['quantity' => 1]);
        $food = Food::where('id',$request->food_id)->first();
        $total = $food->price;
        $request->merge(['total' => $total]);
        Cart::create($request->only('user_id','food_id','quantity','total'));
        return redirect()->route('show.cart');
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
