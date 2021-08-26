<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with('restaurant')->paginate(5);
        return view('Admin.Bill.index', compact('bills'));
    }

    public function detail($id)
    {
        $bill = Bill::findOrFail($id);
        $bill_detail_food = BillDetail::where('bill_id', $id)->get();
        return view('Admin.Bill.billdetail', compact('bill', 'bill_detail_food'));
    }
    public function update(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = $request->status;
        $bill->save();
        return redirect()->route('bill.index');
    }
}
