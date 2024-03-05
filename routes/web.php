<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function(){
    Route::get("/",function(){
        return "admin home";
    });
    Route::get("/add",function(){
        return "admin add";
    });
    Route::prefix("products")->group(function(){
        Route::get("/",function(){
            return "admin product home";
        });
    });
});

Route::get("/nav", function(Request $request){
   return redirect('/');
});

Route::prefix("/")->name("posts.")->group(function(){
    Route::get("",[HomeController::class,'index'])->name("index");
 });

Route::prefix("/users")->group(function(){
    Route::get("",[UserController::class,"index"]);
    Route::get("/add",[UserController::class,'add']);
    Route::post("/add",[UserController::class,'postAdd']);
    Route::get("/edit/{id}",[UserController::class,'getEdit']);
    Route::post("/edit/{id}",[UserController::class,'postEdit']);
});
