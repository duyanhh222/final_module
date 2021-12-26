<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{

    public function index()
    {
        $config = Config::find(1);
        return view('Admin.Config.index', compact('config'));
    }

    public function edit()
    {
        $config = Config::find(1);
        return view('Admin.Config.edit', compact('config'));
    }

    public function update(Request $request)
    {
        $config = Config::find(1);
        $config->phone = $request->phone;
        $config->email = $request->email;
        $config->address = $request->address;
        $config->facebook = $request->facebook;
        $config->char_title1 = $request->char_title1;
        $config->char_title2 = $request->char_title2;
        $config->char_title3 = $request->char_title3;
        $config->char_title4 = $request->char_title4;

        if(!$request->has('logo')){
            $file_file = $request->file_logo;
            $request->merge(['image' => $file_file]);
            $config->logo =  $file_file;
        }
        if($request->has('logo')){
            $old_file = $config->logo;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->logo;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('logo')->storeAs('public/images', $newFileName);
            $request->merge(['logo' => $newFileName]);
            $config->logo =  $newFileName;
        }

        if(!$request->has('banner1')){
            $file_file = $request->file_banner1;
            $request->merge(['image' => $file_file]);
            $config->banner1 =  $file_file;
        }
        if($request->has('banner1')){
            $old_file = $config->banner1;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->banner1;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('banner1')->storeAs('public/images', $newFileName);
            $request->merge(['banner1' => $newFileName]);
            $config->banner1 =  $newFileName;
        }

        if(!$request->has('banner2')){
            $file_file = $request->file_banner2;
            $request->merge(['image' => $file_file]);
            $config->banner2 =  $file_file;
        }
        if($request->has('banner2')){
            $old_file = $config->banner2;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->banner2;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('banner2')->storeAs('public/images', $newFileName);
            $request->merge(['banner2' => $newFileName]);
            $config->banner2 =  $newFileName;
        }

        if(!$request->has('banner3')){
            $file_file = $request->file_banner3;
            $request->merge(['image' => $file_file]);
            $config->banner3 =  $file_file;
        }
        if($request->has('banner3')){
            $old_file = $config->banner3;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->banner3;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('banner3')->storeAs('public/images', $newFileName);
            $request->merge(['banner3' => $newFileName]);
            $config->banner3 =  $newFileName;
        }

        if(!$request->has('char1')){
            $file_file = $request->file_char1;
            $request->merge(['image' => $file_file]);
            $config->char1 =  $file_file;
        }
        if($request->has('char1')){
            $old_file = $config->char1;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->char1;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('char1')->storeAs('public/images', $newFileName);
            $request->merge(['char1' => $newFileName]);
            $config->char1 =  $newFileName;
        }

        if(!$request->has('char2')){
            $file_file = $request->file_char2;
            $request->merge(['image' => $file_file]);
            $config->char2 =  $file_file;
        }
        if($request->has('char2')){
            $old_file = $config->char2;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->char2;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('char2')->storeAs('public/images', $newFileName);
            $request->merge(['char2' => $newFileName]);
            $config->char2 =  $newFileName;

        }

        if(!$request->has('char3')){
            $file_file = $request->file_char3;
            $request->merge(['image' => $file_file]);
            $config->char3 =  $file_file;
        }
        if($request->has('char3')){
            $old_file = $config->char3;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->char3;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('char3')->storeAs('public/images', $newFileName);
            $request->merge(['char3' => $newFileName]);
            $config->char3 =  $newFileName;
        }

        if(!$request->has('char4')){
            $file_file = $request->file_char4;
            $request->merge(['image' => $file_file]);
            $config->char4 =  $file_file;
        }
        if($request->has('char4')){
            $old_file = $config->char4;
            Storage::delete('/public/images/'. $old_file);
            $file = $request->char4;
            $fileName = $file->getClientOriginalName();
            $newFileName = date('d-m-Y-H-i') . "_$fileName";
            $request->file('char4')->storeAs('public/images', $newFileName);
            $request->merge(['char4' => $newFileName]);
            $config->char4 =  $newFileName;
        }
        $config->save();
        return  redirect()->route('config.index');
    }
}
