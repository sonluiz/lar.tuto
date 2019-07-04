<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    //phuong thuc này tra về view để đăng nhập admin
    public function login(){
        return view('admin.auth.login');

    }

    //phương thuc này để đanwwg nhập admin bang pthuc post
    public function loginAdmin(Request $request){
        //validate du lieu
        $this->validate($request, array(
            'email' => 'required|email',
            'password' =>'required|min:6'
        ));

        //dang nhập
        if (Auth::guard('admin')->attempt(
            ['email'=>$request->email, 'password'=>$request->password],$request->remember
        )){
            // nếu đang nhap thành công thi trỏ tới admin dashboard
            return redirect()->intended(route('admin.dashboard'));

        }
        //đăng nhập thất bại sẽ quay trở lại form đăng nhập với giá trị của hai ô input cũ là email và pass

        return redirect()->back()->withInput($request->only('email','remember'));

    }

    //phương thức này dùng để đang xuất
    public function logout(){
        Auth::guard('admin')->logout();
        //chuyển hướng về trang login của admin
        return redirect()->route('admin.auth.login');

    }
}
