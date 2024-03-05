<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function About(){
        $title = "hello world";
        return view('about.index',compact("title"));
    }
}
