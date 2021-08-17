<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\Food;
use App\Models\FoodTag;
use App\Models\Restaurant;
use App\Models\Tag;
use Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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

    public function loadRegister()
    {
        return view('Client.register');
    }

    public function register(RegisterRequest $request)
    {
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
            Mail::to($email)->send(new SendMail()); 
            return redirect()->route('client.login');
        }
    }

    public function index()
    {
        return view('Client.login');
    }

    public function check(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('user_email',$email)->where('user_password',$password)->first();
        if(isset($user)){
            Session::put('level','user');
            Session::put('user_id',$user->id);
            Session::put('user_name',$user->user_name);
            Session::put('user_level',$user->user_level);
            Session::put('user_restaurant',$user->user_restaurent);

            return redirect()->route('client.createFood');
        }
            Session::put('login_fail', 'Kiểm tra lại email hoặc mật khẩu');
            return view('Client.login');
    }

    public function showList()
    {
        $categories = Category::all();
        return view('Client.User.listFood', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Client.User.createFood', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->restaurant_name != null){
            $data = array();
            $data['name'] = $request->restaurant_name;
            $data['address'] = $request->restaurant_address;
            $data['time_open'] = $request->time_open;
            $data['time_close'] = $request->time_close;
            $data['service'] = $request->service;
            $data['phone'] = $request->phone;
            $data['explain'] = $request->explain;
            $restaurantId = Restaurant::insertGetId($data);
            $request->merge(['restaurant_id' => $restaurantId]);
        }
        if($request->has('file')){
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('file')->storeAs('public/images', $newFileName);
            $request->merge(['image' => $newFileName]);
        }
        $id = Session::get('user_id');
        $request->merge(['user_id' => $id]);
        $foodId = Food::insertGetId($request->only( 'name','category_id','restaurant_id','price','price_discount','image','description','status','on_sale',
            'coupon','count_coupon','time_preparation', 'user_id'));
        if($request->tag != null){
            $tags = $request->tag;
            $hashtag = explode(',',$tags);
            $count = 0;
            $hash = array();
            $tag2 = Tag::all();
            for($i= 0;$i<count($hashtag);$i++){
                $flag = 0;
                foreach($tag2 as $value){
                    if($this->slugify($hashtag[$i]) == $value->slug){
                        $tagId = Tag::where('slug',$this->slugify($hashtag[$i]))->first();
                        $hash[$count] = $tagId->id;
                        $count++;
                        $flag = 1;
                    }
                }
                if($flag == 0){
                    $dt = array();
                    $dt['name'] = $hashtag[$i];
                    $dt['slug'] = $this->slugify($hashtag[$i]);
                    $tag3 = Tag::insertGetId($dt);
                    $hash[$count] = $tag3;
                    $count++;
                }
            }
        }
        if(count($hash) > 0){
            foreach($hash as $value){
                $arr = array();
                $arr['food_id'] = $foodId;
                $arr['tag_id'] = $value;
                FoodTag::insertGetId($arr);
            }
        }
        return redirect()->route('client.listFood');
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
