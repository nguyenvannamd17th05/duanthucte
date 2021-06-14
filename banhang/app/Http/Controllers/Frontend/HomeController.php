<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders=Slider::all();
        $categories=Category::where('parent_id',0)->get();

        return view('home.home',compact('sliders','categories'));
    }
}
