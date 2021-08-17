<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\FoodTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('Client.Home.index', compact('categories'));
    }

    public function home()
    {
        $mostView = Food::orderByDesc('view_count')->limit('16')->get();
        $categories = Category::all();
        $onSale = Food::where('on_sale', 1)->limit('16')->get();
        $fastDelivery = Food::orderByDesc('time_preparation')->limit('20')->get();
        $sell_quantity = Food::orderByDesc('sell_quantity')->limit('23')->get();
        $mostNew = Food::orderByDesc('created_at')->limit('12')->get();
        $bestPrice = Food::orderByDesc('price_discount')->first();
        $tags = Tag::all();
        return view('Client.home', compact('categories', 'tags', 'bestPrice', 'mostNew' ,'mostView', 'onSale', 'fastDelivery',  'sell_quantity'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $foods = Food::where('category_id', $id)->paginate(2);
        return view('Client.Category.showcategory', compact('category',  'categories', 'foods'));
    }

    public function search(Request $request)
    {
        //$contact = Config::orderByDesc('config_id')->first();
        $keyword = $request->input('keyword');
        if (!$keyword)
        {
            return redirect()->route('client.home');
        }
        $foods = Food::where('name', 'LIKE', '%' .$keyword. '%')->orderBy('created_at','desc')->paginate(1);
        $foods->withPath("search?_token=$request->token&keyword=$request->keyword");
        $categories = Category::orderByDesc('count')->get();

        return view('Client.Food.resultsearch', compact('foods', 'categories', 'keyword'));

    }

    public function tag($id)
    {
        $tag = Tag::findOrFail($id);
        $food_tags = FoodTag::where('tag_id', $id)->paginate(2);
        $categories = Category::all();
        return view('Client.Tag.showtag', compact('food_tags', 'categories', 'tag'));

    }
}
