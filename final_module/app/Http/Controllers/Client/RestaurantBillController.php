<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RestaurantBillController extends Controller
{
    public function index()
    {
        $id = Session::get('user_id');
        $user = User::where('id', $id)->first();
        $bills = Bill::where('restaurant_id', $user->user_restaurent)->paginate(5);
        return view('Client.PartnerBill.index', compact('bills'));
    }

    public function detail($id)
    {
        $bill = Bill::findOrFail($id);
        $bill_detail_food = BillDetail::where('bill_id', $id)->get();
        return view('Client.PartnerBill.billdetail', compact('bill', 'bill_detail_food'));
    }
}
