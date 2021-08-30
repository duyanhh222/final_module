<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['user'])->where('status',2)->orWhere('status',0)->paginate(5);
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

    public function disable($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if(isset($restaurant)){
            $restaurant->status = 0;
            $restaurant->save();
        }
        return redirect()->route('restaurant.index');

    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if(isset($restaurant)){
            $user = User::where('user_restaurent', $id)->first();
            if (isset($user))
            {
                $user->user_level = 0;
                $user->save();
            }
            $restaurant->delete();
        }
        return redirect()->route('restaurant.index');

    }

    public function dashboard($id)
    {
        $totals = null;
        $total = Bill::select(DB::raw("(sum(total)) as totals"), DB::raw("(count(created_at)) as number"))
                ->where('status', '5')->where('restaurant_id', $id)
                ->get();
        $start = request()->start;
        $end = request()->end;
        if (isset($start) && isset($end)) {
            $totals = Bill::select(DB::raw("(sum(total)) as totals"), DB::raw("(count(created_at)) as number"), DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as time"))
                    ->where('status', '5')->where('restaurant_id', $id)
                    ->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end)
                    ->orderBy('time')->groupBy('time')->get();
        }
        return view('Admin.Restaurant.dashboard', compact('total', 'totals', 'start', 'end'));
    }
}
