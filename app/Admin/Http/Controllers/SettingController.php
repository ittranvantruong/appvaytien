<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    //
    public function index(){
        $settings = Setting::all();
        return view('admin.setting', compact('settings'));
    }

    public function store(Request $request){
        $array = $request->input(); 
        unset($array['_token']);
        foreach($array as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['plain_value' => $value]
            );
        }
        return back()->with('success', 'Thực hiện thành công');
    }
}
