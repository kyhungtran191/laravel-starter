<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model
{
    use HasFactory;
    protected $table="products";

    function getAllProducts(){
        $products = DB::table($this->table)->select(DB::raw("products.*,categories.name as category_name"))->join("categories", "products.category_id","=","categories.id")->get();
        return $products;
    }

    function addProduct($data){
        $id = DB::table($this->table)->insertGetId($data);
        return $id;
    }

    function getDetails($id){
        $data = DB::table($this->table)->where("id",$id)->first();
        return $data;
    }

    function updateProduct($id,$data){
        $data = DB::table($this->table)->where("id",$id)->update($data);
        return $data;
    }

    function deleteProduct($id){
        $data = Db::table($this->table)->where("id",$id)->delete();
        return $data;
    }

}
