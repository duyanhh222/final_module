<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\FoodTag;
use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $foods = Food::OrderBy('id','DESC')->paginate(5);
        $key = request()->key;
        if(isset($key)){
            $foods = Food::where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('Admin.Food.index',compact('foods','key'));
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
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|min:0|gt:price_discount',
            'price_discount' => 'required|numeric|min:0',
            'coupon' => 'max:255',
            'count_coupon' => 'max:255',
            'time_preparation' => 'max:255',
            'restaurant_name' =>'max:255',
            'restaurant_address' =>'max:255',
            'time_open' =>'max:255',
            'time_close' =>'max:255',
            'explain' => 'max:255',
            'service' => 'max:255',
            'phone' => 'nullable|numeric|min:100000000|max:1000000000',
            'tag' => 'required|max:255',
            'file' => 'required|image|mimes:jpeg,jpg,png|mimetypes:image/jpeg,image/png,image/jpg|max:5120'
        ],
        [
            'phone.numeric' => 'số điện thoại phải là chữ số',
            'phone.min' => 'số điện thoại phải có 10 chữ số ',
            'phone.max' => 'số điện thoại phải có 10 chữ số ',
            'name.required' => 'tên món ăn không được để trống',
            'category_id.required' => 'tên danh mục không được để trống',
            'price.required' => 'giá không được để trống',
            'price.min' => 'giá tiền nhỏ nhất bằng 0',
            'price.gt' => 'Giá tiền phải lớn hơn giá khuyến mại',
            'price_discount.required' => 'giá không được để trống',
            'price_discount.min' => 'giá tiền nhỏ nhất bằng 0',
            'status.required' => 'Ưu đãi không được để trống',
            'file.required' => 'Ảnh không được để trống',
            'tag.required' => 'Tag không được để trống'

        ]
    );
        $categ1 = Category::where('id',$request->category_id)->first();
        $a = $categ1->amount + 1;
        Category::where('id',$request->category_id)->update(['amount' => $a]);
        if($request->restaurant_name != null){
            $restaurant_flag = 0;
            $restaurants = Restaurant::all();
            foreach($restaurants as $value){
                if($this->slugify($request->restaurant_name) == $this->slugify($value->name) &&
                $this->slugify($request->restaurant_address) == $this->slugify($value->address)){
                    $request->merge(['restaurant_id' => $value->id]);
                    $restaurant_flag = 1;
                }
            }
            if($restaurant_flag == 0){
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
        }
        if($request->has('file')){
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('file')->storeAs('public/images', $newFileName);
            $request->merge(['image' => $newFileName]);
        }

        if (!isset($request->status)){
            $request->merge(['status' => 0]);
        }

        if (!isset($request->on_sale)){
            $request->merge(['on_sale' => 0]);
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
        if(isset($hash)){
            foreach($hash as $value){
                $arr = array();
                $arr['food_id'] = $foodId;
                $arr['tag_id'] = $value;
                FoodTag::insertGetId($arr);
            }
        }
        return redirect()->route('food.index')->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        $food_show = Food::with(['category','restaurant','user'])->where('id',$food->id)->first();
        $tags = FoodTag::where('food_id', $food->id)->get();
        return view('Admin.Food.detail',compact('food_show', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $categ1 = Category::where('id',$food->category_id)->first();
        Session::put('categ1',$categ1->id);
        $tags = '';
        $foodtag = FoodTag::where('food_id',$food->id)->get();

        foreach($foodtag as $value){
            $tagss = Tag::where('id',$value->tag_id)->first();
            $tags .= $tagss->name.',';
        }
        $tags_name =trim($tags,',');
        $restaurantId = $food->restaurant_id;
        $restaurant = Restaurant::where('id',$restaurantId)->first();
        $data = Category::all();
        return view('Admin.Food.edit',compact('food','data','restaurant','tags_name'));
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
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|min:0|gt:price_discount',
            'price_discount' => 'required|numeric|min:0',
            'coupon' => 'max:255',
            'count_coupon' => 'max:255',
            'time_preparation' => 'max:255',
            'restaurant_name' =>'max:255',
            'restaurant_address' =>'max:255',
            'time_open' =>'max:255',
            'time_close' =>'max:255',
            'explain' => 'max:255',
            'service' => 'max:255',
            'phone' => 'max:255',
            'tag' => 'required|max:255',
            'file' => 'image|mimes:jpeg,jpg,png|mimetypes:image/jpeg,image/png,image/jpg|max:5120'
        ],
        [
            'phone.numeric' => 'số điện thoại phải là chữ số',
            'phone.min' => 'số điện thoại phải có 10 chữ số ',
            'phone.max' => 'số điện thoại phải có 10 chữ số ',
            'name.required' => 'tên món ăn không được để trống',
            'category_id.required' => 'tên danh mục không được để trống',
            'price.required' => 'giá không được để trống',
            'price.min' => 'giá tiền nhỏ nhất bằng 0',
            'price.gt' => 'Giá tiền phải lớn hơn giá khuyến mại',
            'price_discount.required' => 'giá không được để trống',
            'price_discount.min' => 'giá tiền nhỏ nhất bằng 0',
            'status.required' => 'Ưu đãi không được để trống',
            'file.required' => 'Ảnh không được để trống',
            'tag.required' => 'Tag không được để trống'
        ]
    );
        $categ1 = Category::where('id',Session::get('categ1'))->first();
        $a = $categ1->amount - 1;
        Category::where('id',$food->category_id)->update(['amount' => $a]);
        Session::forget('categ1');
        $categ2 = Category::where('id',$request->category_id)->first();
        $b = $categ2->amount + 1;
        Category::where('id',$request->category_id)->update(['amount' => $b]);
        $restaurant_flag = 0;
        $restaurants = Restaurant::all();
        foreach($restaurants as $value){
            if($this->slugify($request->restaurant_name) == $this->slugify($value->name) &&
                $this->slugify($request->restaurant_address) == $this->slugify($value->address)){
                $request->merge(['restaurant_id' => $value->id]);
                $restaurant_flag = 1;
            }
        }
        if($restaurant_flag == 0){
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
        if(!$request->has('file')){
            $file_file = $request->file_file;
            $request->merge(['image' => $file_file]);
        }
        if($request->has('file')){
             $file = $food->image;
            Storage::delete('/public/images/'. $file);
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('file')->storeAs('public/images', $newFileName);
            $request->merge(['image' => $newFileName]);
        }
        if (!isset($request->status)){
            $request->merge(['status' => 0]);
        }

        if (!isset($request->on_sale)){
            $request->merge(['on_sale' => 0]);
        }
        $food->update($request->only( 'name','category_id','restaurant_id','price','price_discount','image','description','status','on_sale',
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
        if(isset($hash)){
            FoodTag::where('food_id',$food->id)->delete();
            foreach($hash as $value){
                $arr = array();
                $arr['food_id'] = $food->id;
                $arr['tag_id'] = $value;
                FoodTag::insertGetId($arr);
            }
        }
        if(!isset($hash)){
            FoodTag::where('food_id',$food->id)->delete();
        }
        return redirect()->route('food.index')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $categ1 = Category::where('id',$food->category_id)->first();
        $a = $categ1->amount - 1;
        Category::where('id',$food->category_id)->update(['amount' => $a]);
        $tags = FoodTag::where('food_id',$food->id)->get();
        if(isset($tags)){
            foreach($tags as $value){
                FoodTag::where('food_id',$food->id)->delete();
            }
        }
      $file = $food->image;
      Storage::delete('/public/images/'. $file);
      $food->delete();
      return redirect()->route('food.index')->with('success','Xoá thành công');

    }
}
