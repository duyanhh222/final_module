<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::where('status', 2)->paginate(5);
        return view('Admin.Restaurant.index', compact('restaurants'));
    }
    public function register()
    {
        $restaurants = Restaurant::where('status', 1)->paginate(5);
        return view('Admin.Restaurant.restaurantregister', compact('restaurants'));
    }
    public function update($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();
        $restaurant->status = 2;
        $restaurant->save();
        $user = User::where('user_restaurent', $id)->first();
        if (isset($user))
        {
            $user->user_level = 2;
            $user->save();
        }
        return redirect()->route('restaurant.index');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $user = User::where('user_restaurent', $id)->first();
        if (isset($user))
        {
            $user->user_level = 0;
            $user->save();
        }
        $restaurant->delete();
        return redirect()->route('restaurant.index');

    }
}
