<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    public function getUsers(){
        $users = DB::select("select * from users");
        return $users;
    }
    public function addUser($data){
        DB::insert("Insert into users(email,fullName) values (?,?)",$data);
    }
    public function learnQueryBuilder(){
        //Lấy tất cả bản ghi
        $data = DB::table("users")
        ->select('email','fullName')
        ->where("id",2)
        ->get();
        //Get first
        dd($data);
        $data_first = DB::table("users")->first();

    }
}
