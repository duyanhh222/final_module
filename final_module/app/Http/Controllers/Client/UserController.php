<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadRegister()
    {
        return view('Client.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            're_password' => 'required',
        ],
        [

        ]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $repassword = $request->re_password;
        $user = User::where('user_email',$email)->first();
        if(!isset($user) && ($password == $repassword)){
            $newUser = new User();
            $newUser->user_name = $name;
            $newUser->user_email = $email;
            $newUser->user_password = $password;
            $newUser->user_phone = 0;
            $newUser->user_address = 0;
            $newUser->user_restaurent = 0;
            $newUser->save();
            Session::put('register_success', "Đăng ký tài khoản thành công");
            return redirect()->route('client.login');
        }
    }

    public function index()
    {
        return view('Client.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],
        [

        ]);
        $email = $request->email;
        $password = $request->password;
        $user = User::where('user_email',$email)->where('user_password',$password)->first();
        if(isset($user)){
            Session::put('user_name',$user->user_name);
            return redirect()->route('client.loadRegister');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
