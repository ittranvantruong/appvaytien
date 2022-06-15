<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SinglePageController extends Controller
{
    //
    public function advise(){
        $zalo = Setting::select('plain_value')->where('key', 'site_zalo')->first();
        return view('public.single_page.advise', compact('zalo'));
    }
    public function aboutUs() {
        $aboutus = Setting::select('plain_value')->where('key', 'site_introduce')->first();
        return view('public.single_page.about_us', compact('aboutus'));
    }
    
}
