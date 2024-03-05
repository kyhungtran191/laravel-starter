<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //
    public function Index(){
        $users = DB::select("select * from Users WHERE id > ? ",[1]);
        dd($users);
        return  "Home";
    }
    public function About(){
        $title = "hello world";
        return view('about.index',compact("title"));
    }
}
