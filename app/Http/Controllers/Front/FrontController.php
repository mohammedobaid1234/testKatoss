<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller{
    public function index(){
        return view('front.front', [
            'settings' => Setting::first(),
            'sections' => Section::get()
        ]);
    }
}
