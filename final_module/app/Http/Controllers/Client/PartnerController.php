<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Config;
use App\Models\Favorite;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    public function create ()
    {
        if(Session::has('user_id')){
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $config = Config::find(1);
        $categories = Category::all();
        return view('Client.Partner.create', compact('like', 'config', 'cart_quantity', 'categories', 'carts'));
    }

    public function store(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->phone = $request->phone;
        $restaurant->time_open = $request->time_open;
        $restaurant->time_close = $request->time_close;
        $restaurant->service = $request->service;
        $restaurant->explain = $request->explain;
        $restaurant->address = $request->address;
        $restaurant->status = 0;
        $restaurant->save();
        $last_id = Restaurant::orderByDesc('id')->first();
        $user_id = Session::get('user_id');
        $user = User::where('id', $user_id)->first();
        $user->user_level = 1;
        $user->user_restaurent = $last_id->id;
        $user->save();

        return redirect()->route('client.partner.success');

    }

    public function success()
    {
        if(Session::has('user_id') )
        {
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $config = Config::find(1);
        $categories = Category::all();
        return view('Client.Partner.success', compact('like', 'config', 'cart_quantity', 'categories', 'carts'));

    }
}
