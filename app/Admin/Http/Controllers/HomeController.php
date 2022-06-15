<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return redirect()->route('admin.setting');
        return view('admin.index');
    }
}
