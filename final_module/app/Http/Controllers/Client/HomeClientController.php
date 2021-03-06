<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Config;
use App\Models\Favorite;
use App\Models\Food;
use App\Models\FoodTag;
use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeClientController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $config = Config::find(1);
        dd($config);
        return view('Client.Home.index', compact('categories', 'config'));
    }

    public function home()
    {
        if(Session::has('user_id')){
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $mostView = Food::with(['restaurant'])->orderByDesc('view_count')->limit('16')->get();
        $categories = Category::all();
        $onSale = Food::with(['restaurant'])->where('on_sale', 1)->limit('16')->get();
        $fastDelivery = Food::with(['restaurant'])->orderByDesc('time_preparation')->limit('20')->get();
        $sell_quantity = Food::with(['restaurant'])->orderByDesc('sell_quantity')->limit('23')->get();
        $mostNew = Food::with(['restaurant'])->orderByDesc('created_at')->limit('12')->get();
        $bestPrice = Food::with(['restaurant'])->orderByDesc('price_discount')->first();
        $tags = Tag::all();
        $config = Config::find(1);
        if(isset($like)){
            return view('Client.home', compact('categories', 'config',  'tags', 'bestPrice', 'mostNew' ,'mostView', 'onSale', 'fastDelivery',  'sell_quantity', 'like','cart_quantity'));
        }
        else
        {
            return view('Client.home', compact('categories', 'config',  'tags', 'bestPrice', 'mostNew' ,'mostView', 'onSale', 'fastDelivery',  'sell_quantity'));

        }
    }

    public function category($id)
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
        $category = Category::findOrFail($id);
        $foods = Food::with(['restaurant'])->where('category_id', $id)->paginate(2);
        if(isset($carts)) {
            return view('Client.Category.showcategory', compact('category', 'config', 'categories', 'foods', 'like','cart_quantity'));

        }
        return view('Client.Category.showcategory', compact('category', 'config', 'categories', 'foods'));
    }

    public function search(Request $request)
    {
        $config = Config::find(1);
        $keyword = $request->input('keyword');
        if(Session::has('user_id')){
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        if (!$keyword)
        {
            return redirect()->route('client.home');
        }
        $foods = Food::with(['restaurant'])->where('name', 'LIKE', '%' .$keyword. '%')->orderBy('created_at','desc')->paginate(1);
        $foods->withPath("search?_token=$request->token&keyword=$request->keyword");
        $categories = Category::orderByDesc('amount')->get();
        if(isset($carts)){
            return view('Client.Food.resultsearch', compact('foods', 'config','categories', 'keyword','cart_quantity','like'));
        }
        return view('Client.Food.resultsearch', compact('foods', 'config','categories', 'keyword'));

    }

    public function tag($id)
    {
        $food = array();
        if(Session::has('user_id')){
            $like = Favorite::where('user_id',Session::get('user_id'))->get();
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $config = Config::find(1);
        $tag = Tag::findOrFail($id);
        $food_tags = FoodTag::with(['food'])->where('tag_id', $id)->paginate(2);
        foreach($food_tags as $food_tag){
            $food[$food_tag->id] = Food::with('restaurant')->where('id',$food_tag->food_id)->first();
        }
        $categories = Category::all();
        if(isset($carts)){
            return view('Client.Tag.showtag', compact('food_tags', 'like', 'config','categories', 'tag','cart_quantity','food'));
        }
        return view('Client.Tag.showtag', compact('food_tags', 'config','categories', 'tag','food'));

    }

    public function food($id)
    {
        $foodKey = 'food_' . $id;
        if (Session::has($foodKey) == false)
        {
            Food::where('id', $id)->increment('view_count');
            Session::put($foodKey, 1);

        }
        if(Session::has('user_id')){
            $carts = Cart::where('user_id',Session::get('user_id'))->get();
            $cart_quantity = 0;
            foreach($carts as $cart){
                $cart_quantity += $cart->quantity;
            }
        }
        $config = Config::find(1);
        $tags = FoodTag::where('food_id', $id)->get();
        $categories = Category::all();
        //$contact = Config::orderByDesc('config_id')->first();
        $food = Food::findOrFail($id);
        if(isset($carts)){
            return view('Client.Food.fooddetail', compact('food', 'config', 'categories', 'tags','cart_quantity'));
        }
        return view('Client.Food.fooddetail', compact('food', 'config', 'categories', 'tags'));
    }

    public function restaurant($id)
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
        $restaurant = Restaurant::findOrFail($id);
        $foods = Food::where('restaurant_id', $id)->paginate(5);
        if(isset($carts)){
            return view('Client.Restaurant.foodrestaurant', compact('restaurant', 'config','foods', 'categories','cart_quantity','like'));
        }
        return view('Client.Restaurant.foodrestaurant', compact('restaurant', 'config','foods', 'categories'));
    }

}
