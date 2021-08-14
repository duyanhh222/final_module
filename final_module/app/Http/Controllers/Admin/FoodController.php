<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\FoodTag;
use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Http\Request;

class FoodController extends Controller
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
        $foods = Food::all();
        return view('Admin.Food.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('Admin.Food.create',compact('data'));
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
            $path = $file->store('images','public');
            $request->merge(['image' => $path]);
        }
        $foodId = Food::insertGetId($request->only( 'name','category_id','restaurant_id','price','price_discount','image','description','status','on_sale',
            'coupon','count_coupon','time_preparation'));
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
        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
      
    }
}
