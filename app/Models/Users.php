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
}
