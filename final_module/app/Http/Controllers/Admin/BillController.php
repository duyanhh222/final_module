<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::paginate(5);
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
        $bill_detail_food = BillDetail::where('bill_id', $id)->get();
        $bill = Bill::findOrFail($id);
        if ($bill->status == 0)
        {
            $message = "Không thể cập nhật đơn hàng trạng thái Đã hủy!";
        }
        elseif ($bill->status == 1 &&  $request->status ==0)
        {
            $bill->status = $request->status;
            $message = 'Hủy đơn hàng thành công!';

        }
        elseif ($bill->status == 1 && $request->status == 2 )
        {
            $bill->status = $request->status;
            $message = 'Cập nhật đơn hàng thành công!';
        }
        elseif ($bill->status == 2 && $request->status == 3 )
        {
            $bill->status = $request->status;
            $message = 'Cập nhật đơn hàng thành công!';
        }
        elseif ($bill->status == 3 && $request->status == 4 )
        {
            $bill->status = $request->status;
            $message = 'Cập nhật đơn hàng thành công!';
        }
        elseif ($bill->status == 4 && $request->status == 5 )
        {
            $bill->status = $request->status;
            $message = 'Cập nhật đơn hàng thành công!';
        }
        elseif ($bill->status == 5 && $request->status != 5 )
        {
            $bill->status = $request->status;
            $message = 'Không thể cập nhật đơn hàng Đã hoàn thành!';
        }
        else
        {
            $message = 'Vui lòng cập nhật đơn hàng theo đúng quy trình!';
        }
//        $bill->status = $request->status;
        $bill->save();
        Session::flash('success', $message);
        return view('Admin.Bill.billdetail', compact('bill', 'bill_detail_food'));
    }
}
