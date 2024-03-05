<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
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

Route::get("/nav", function(){
   return redirect('/');
});
