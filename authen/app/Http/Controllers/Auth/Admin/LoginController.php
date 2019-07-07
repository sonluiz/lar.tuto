<?php
namespace App\Http\Controllers\Auth\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    /**
     * Phương thức này trả về view để đăng nhập cho admin
     */
    public function login(){
        return view('admin.auth.login');
    }
    /**
     * Phương thức này dùng để đăng nhập cho admin
     * lấy thông tin từ form có method là POST để xử lý đăng nhập
     */
    public function loginAdmin(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6',
        ));
        // đăng nhập
        if (Auth::guard('admin')->attempt(
            ['email' => $request->email, 'password' => $request->password], $request->remember
        )){
            //nếu đăng nhập thành công thì chuyển hướng sang dashboard của admin
            return redirect()->intended(route('admin.dashboard'));
        }
        //nếu đăng nhập thất bại thì quay trở lại trang đăng nhập
        //với giá trị 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    /**
     * Phương thức này để đăng xuất tài khoản của admin
     */
    public function logout(){
        Auth::guard('admin')->logout();
        // chuyển hướng về trang login của admin
        return redirect()->route('admin.auth.login');
    }
}