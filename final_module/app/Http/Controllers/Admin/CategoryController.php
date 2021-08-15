<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
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
        $categories = Category::orderBy('id', 'ASC')->paginate(15);
        return view('Admin.Category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.create');
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
            'name' => 'required|unique:categories',
            'file' => 'required|image|mimes:jpeg,jpg,png|mimetypes:image/jpeg,image/png,image/jpg|max:5120'
        ]);
        if($request->has('file')){
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('file')->storeAs('public/images', $newFileName);
            $request->merge(['image' => $newFileName]);
        }
        Category::create($request->only('name','image'));
        return redirect()->route('category.index')->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Admin.Category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'amount' => 'required|numeric',
            'file' => 'image|mimes:jpeg,jpg,png|mimetypes:image/jpeg,image/png,image/jpg|max:5120'
        ]);
        if(!$request->has('file')){
            $file_file = $request->file_file;
            $request->merge(['image' => $file_file]);
        }
        if($request->has('file')){
            $old_file = $category->image;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('file')->storeAs('public/images', $newFileName);
            $request->merge(['image' => $newFileName]);
        }
        $category->update($request->only('name','image','amount'));
        return redirect()->route('category.index')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $old_file = $category->image;
        Storage::delete('/public/images/'. $old_file);
        $category->delete();
        return redirect()->route('category.index')->with('success','Xóa thành công');
    }
}
