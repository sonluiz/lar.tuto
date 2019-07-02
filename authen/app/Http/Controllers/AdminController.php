<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // tạo controller bằng câu lệnh php artisan make:controller namecontroller
    public function index(){
        //phương thức trả về view đang nhap thanh công
        return view('admin.dashboard');

    }

    //ơhuong thuc trả về thành công khi dang ki admin
    public function create(){
        return view('admin.auth.register');

    }
    public function store(Request $request){
        //validate dư liệu dk gui tư form đi
        $this ->validate($request,array(
            'name' =>'required',
            'email' =>'required',
            'password'=>'required'
        ));

        //khơi tạo mode để lưu admin mơi
        $adminmodel = new AdminModel();
        $adminmodel->name =$request->name;
        $adminmodel->email = $request->email;
        $adminmodel->password = bcrypt($request->password); //ham để mã hóa mật khẩu

        return redirect()->route();


    }
}
