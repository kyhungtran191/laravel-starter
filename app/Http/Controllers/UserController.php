<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
class UserController extends Controller
{
    //
    private $users;
    public function __construct(){
        $this->users = new Users();
    }

    public function Index(){
        $title ="Danh sách người dùng";
        $usersList = $this->users->getUsers();
        $data = $this->users->learnQueryBuilder();
        dd($data);
        return view("clients.users.list",compact("title","usersList"));
    }

    public function add(){
        $title ="Thêm người dùng";
        return view("clients.users.add",compact("title"));
    }

    public function postAdd(Request $request){
        $request->validate([
            'fullName'=>"required|min:5",
            "email"=>"required|email"
        ],[
            "fullName.required"=>"Họ và tên bắt buộc phải nhập",
            "fullname.min"=>"Họ và tên phải từ :min ký tự trở lên",
            "email.required"=>"Email bắt buộc phải nhập",
            "email.email"=>"Email không đúng định dạng"
        ]);
        $data = [
            $request->email,
            $request->fullName,
        ];
        $this->users->addUser($data);
        return redirect("/users")->with("msg","Tạo mới người dùng thành công");
    }

    public function getEdit(){
        $title ="Sửa người dùng";
        return view("clients.users.edit",compact("title"));
    }

    public function postEdit(Request $request){
        $request->validate([
            'fullName'=>"required|min:5",
            "email"=>"required|email"
        ],[
            "fullName.required"=>"Họ và tên bắt buộc phải nhập",
            "fullname.min"=>"Họ và tên phải từ :min ký tự trở lên",
            "email.required"=>"Email bắt buộc phải nhập",
            "email.email"=>"Email không đúng định dạng"
        ]);
        $data = [
            $request->email,
            $request->fullName,
        ];
        $this->users->addUser($data);
        return redirect("/users")->with("msg","Tạo mới người dùng thành công");
    }


}
