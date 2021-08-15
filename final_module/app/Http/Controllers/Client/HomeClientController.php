<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
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
        $mostView = Food::orderByDesc('view_count')->limit('19')->get();
        $categories = Category::all();
        $onSale = Food::where('on_sale', 1)->limit('16')->get();
        $fastDelivery = Food::orderByDesc('time_preparation')->limit('20')->get();
        $sell_quantity = Food::orderByDesc('sell_quantity')->limit('23')->get();
        $mostNew = Food::orderByDesc('created_at')->limit('12')->get();
        return view('Client.home', compact('categories', 'mostNew' ,'mostView', 'onSale', 'fastDelivery',  'sell_quantity'));
    }

}
