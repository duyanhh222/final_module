<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slugify($str) { 
        $str = trim(mb_strtolower($str)); 
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str); 
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str); 
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str); 
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str); 
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str); 
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str); 
        $str = preg_replace('/(đ)/', 'd', $str); 
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str); 
        $str = preg_replace('/([\s]+)/', '-', $str); 
        return $str; 
    }
    public function index()
    {
        return view('Admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/',
            'password' => 'required'
        ],
        [

        ]);
        $email = $request->email;
        $password = $request->password;
        $admin = Admin::where('admin_email',$email)->where('admin_password',$password)->first();
        if(isset($admin)){
            Session::put('admin_name',$admin->admin_name);
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('admin.login')->with('message','Thông tin tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    public function logout()
    {
        Session::forget('admin_name');
        Session::forget('message');
        return redirect()->route('admin.login');

    }
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
