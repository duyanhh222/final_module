<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

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
}
