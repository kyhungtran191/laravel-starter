<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){

        // $allPosts = Post::all();

        // if($allPosts->count()){
        //     foreach($allPosts as $post){
        //         echo $post->title.'<br>';
        //     }
        // }
        $detail = Post::find(1);

    }
}
