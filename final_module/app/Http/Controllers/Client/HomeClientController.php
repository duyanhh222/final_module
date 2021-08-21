<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        }
        $mostView = Food::orderByDesc('view_count')->limit('16')->get();
        $categories = Category::all();
        $onSale = Food::where('on_sale', 1)->limit('16')->get();
        $fastDelivery = Food::orderByDesc('time_preparation')->limit('20')->get();
        $sell_quantity = Food::orderByDesc('sell_quantity')->limit('23')->get();
        $mostNew = Food::orderByDesc('created_at')->limit('12')->get();
        $bestPrice = Food::orderByDesc('price_discount')->first();
        $tags = Tag::all();
        $config = Config::find(1);
        if(isset($like)){
            return view('Client.home', compact('categories', 'config',  'tags', 'bestPrice', 'mostNew' ,'mostView', 'onSale', 'fastDelivery',  'sell_quantity', 'like'));
        }
        else
        {
            return view('Client.home', compact('categories', 'config',  'tags', 'bestPrice', 'mostNew' ,'mostView', 'onSale', 'fastDelivery',  'sell_quantity'));

        }        
    }

    public function category($id)
    {
        $config = Config::find(1);
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $foods = Food::where('category_id', $id)->paginate(2);
        return view('Client.Category.showcategory', compact('category', 'config', 'categories', 'foods'));
    }

    public function search(Request $request)
    {
        $config = Config::find(1);
        $keyword = $request->input('keyword');
        if (!$keyword)
        {
            return redirect()->route('client.home');
        }
        $foods = Food::where('name', 'LIKE', '%' .$keyword. '%')->orderBy('created_at','desc')->paginate(1);
        $foods->withPath("search?_token=$request->token&keyword=$request->keyword");
        $categories = Category::orderByDesc('amount')->get();

        return view('Client.Food.resultsearch', compact('foods', 'config','categories', 'keyword'));

    }

    public function tag($id)
    {
        $config = Config::find(1);
        $tag = Tag::findOrFail($id);
        $food_tags = FoodTag::with('food')->where('tag_id', $id)->paginate(2);
        $categories = Category::all();
        return view('Client.Tag.showtag', compact('food_tags', 'config','categories', 'tag'));

    }

    public function food($id)
    {
        $config = Config::find(1);
        $tags = FoodTag::where('food_id', $id)->get();
        $categories = Category::all();
        //$contact = Config::orderByDesc('config_id')->first();
        $food = Food::findOrFail($id);
        return view('Client.Food.fooddetail', compact('food', 'config', 'categories', 'tags'));
    }

    public function restaurant($id)
    {
        $config = Config::find(1);
        $categories = Category::all();
        $restaurant = Restaurant::findOrFail($id);
        $foods = Food::where('restaurant_id', $id)->paginate(5);
        return view('Client.Restaurant.foodrestaurant', compact('restaurant', 'config','foods', 'categories'));
    }
}
