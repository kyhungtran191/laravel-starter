<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class ProductsController extends Controller
{
    //

    private $products;
    private $categories;
    public function __construct()
    {
        $this->products = new Products();
        $this->categories = new Categories();
    }
    public function index(){
        $title = "Product List";
        $listProduct = $this->products->getAllProducts();
        $listCategories = $this-> categories -> getAllCategories();
        return view("clients.products.list",compact("title","listProduct","listCategories"));
    }
    public function getAdd(){
        $title = "Add Product";
        $listCategories = $this-> categories -> getAllCategories();
        return view("clients.products.add",compact("title","listCategories"));
    }
    public function postAdd(Request $request){
        $request->validate([
            'name'=>"required",
            "price"=>"required",
            "category"=>"required",
            "status"=>"required"
        ],[
            "name.required"=>"tên bắt buộc phải nhập",
            "price.required"=>"giá bắt buộc phải nhập",
            "category.required"=>"category bắt buộc phải nhập",
            "status.email"=>"status không đúng định dạng"
        ]);
        $data = [
            "name"=> $request->name,
            "price"=>$request->price,
            "category_id"=>$request->category,
            "status"=>$request->status,
        ];
        $status = $this->products->addProduct($data);
        if(empty($status)){
            return redirect(route("products.postAdd"))->with("msg","Error when add product");
        }
       return redirect(route("products.index"))->with("msg","Add successfully new Product");
    }

    public function getEdit($id){
        $title = "Edit Product";
        $listCategories = $this-> categories -> getAllCategories();
        $product = $this->products->getDetails($id);
        return view("clients.products.edit",compact("title","product","listCategories"));
    }

    public function postEdit($id,Request $request){
        $request->validate([
            'name'=>"required",
            "price"=>"required",
            "category"=>"required",
            "status"=>"required"
        ],[
            "name.required"=>"tên bắt buộc phải nhập",
            "price.required"=>"giá bắt buộc phải nhập",
            "category.required"=>"category bắt buộc phải nhập",
            "status.email"=>"status không đúng định dạng"
        ]);
        $data = [
            "name"=> $request->name,
            "price"=>$request->price,
            "category_id"=>$request->category,
            "status"=>$request->status,
        ];

        $status = $this->products->updateProduct($id,$data);
        if(empty($status)){
            return redirect(route("products.postAdd"))->with("msg","Error when add product");
        }
       return redirect(route("products.index"))->with("msg","Update successfully new Product");
    }

    public function deleteProduct($id){
        $status = $this->products->deleteProduct($id);

        return redirect(route("products.index"))->with("msg","Delete successfully  Product");
    }
}
