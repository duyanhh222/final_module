<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request,$like)
    {
        $favorite = Favorite::where('user_id',Session::get('user_id'))->where('food_id',$like)->first();
        if(isset($favorite)){
            Favorite::where('user_id',Session::get('user_id'))->where('food_id',$like)->delete();  
            return response()->json(['message' => 'Bỏ mục yêu thích']);
        }
        else{
            $request->merge(['food_id' => $like]);
        $request->merge(['user_id' => Session::get('user_id')]);
        Favorite::create($request->only('user_id','food_id'));
        return response()->json(['message' => 'Thêm vào mục yêu thích thành công']);
        }
    }
    public function dislike($like)
    {
        $favorite = Favorite::where('user_id',Session::get('user_id'))->where('food_id',$like)->first();
        if(isset($favorite)){
            Favorite::where('user_id',Session::get('user_id'))->where('food_id',$like)->delete();  
            return response()->json(['message' => 'Bỏ mục yêu thích']);
        }
    }
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
        $config = Config::find(1);
        $categories = Category::all();
        $foods = Favorite::with(['food'])->where('user_id',Session::get('user_id'))->paginate(20);
        if(isset($like)){
            return view('Client.Food.favorite',compact('foods', 'config','categories','like','cart_quantity'));

        }
        else{
            return view('Client.Food.favorite',compact('foods', 'config','categories'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
