<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Config;
use Illuminate\Support\Facades\Session;
use App\Models\Favorite;
use App\Models\Cart;
use App\Models\Use_address;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::where('id',$id)->first();
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
        $address = Use_address::where('user_id',$id)->get();
        return view('Client.profile.create',compact('user','like','config','cart_quantity','categories','address'));
    }

    public function update($id,Request $request)
    {
        User::where('id',$id)->update($request->only('user_name','user_phone','user_address'));
        $request->merge(['user_id'=>$id]);
        Use_address::create($request->only('user_id','address'));
        return redirect()->route('client.profile',$id);
    }
}
