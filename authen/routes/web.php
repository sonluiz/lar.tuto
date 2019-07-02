<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//route cho admintration
Route::prefix('admin')->group(function (){
    //gom nhóm group cho phần admin

/*
     * url .../
     * route mac dinh cua admin
*/
    Route::get('/','AdminController@index')->name('admin.dashboard');

    /*
     * url .../dashboard
     * route danwg nhập thành công
*/
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');


    /*
     * url .../register
     * route trả về view để đăng kí tài khoản admin
*/

    Route::get('/register','AdminController@create')->name('admin.register');

    /*
     * url .../register
     * phương thức post
     * route dùng để dki admin từ 1 form post
*/
    Route::post('/register','AdminController@store')->name('admin.register.store');

    /*
     * url .../admin/login
     * route tra về view đăng nhập admin*/
    Route::get('login','Auth/Admin/LoginController@login')->name('admin.auth.login');

    /*
    * url .../admin/login
    * route xu ly qua trinh dang nhap admin*/
    Route::post('login','Auth/Admin/LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /*
    * url .../admin/logout
    * route xu ly qua trinh dang nhap admin*/
    Route::post('logout','Auth/Admin/LoginController@logout')->name('admin.auth.logout');

});



//gọi view trong laravel
Route::get('/', function () {
    return view('welcome');
    //tra ve view welcome trong resoure->view ->welcome.blade.php
});
Route::get('view/sonhong/{son}', function ($son){
    return view('son.login', ['son' => $son]);
});
Route::get('toidicode', function (){
    return view('toidicode');
});

//GET
Route::get('sonhong',function (){
    echo "chào các bạn cuộc sống thật nhat";
});
Route::get('sonhong/{ten}',function ($ten){
    echo "chào các bạn cuộc sống thật nhat: ".$ten;
})->where(['ten'=>'[a-z]']);
Route::get('sonhong/{ten}/{tuoi}',function ($ten,$tuoi){
    echo "chào các bạn tên: ".$ten ." tuôi là: ".$tuoi;
})->where(['ten'=>'[a-z]+', 'tuoi'=>'[0-9]+']);

//dinh danh
Route::get('router1',['as'=>'myrouter',function(){
    echo "xin chào các bạn";
}]);

Route::get('phuongthucgeturl','Mycontroller@geturl');

//khi goi đến /goiten nó sẽ chạy đên router1 bang dinh danh
Route::get('goiten',function (){
    return redirect()->route('myrouter');

});

//group
Route::group(['prefix' => 'user'], function(){
    Route::get('bai1', function (){
        echo "Bài 1.";
    });
    Route::get('bai2/laravel', function (){
        echo "Bài 2.";
    });
    Route::get('bai3', function (){
        echo "Bài 3.";
    });

});

//goi controller
Route::get('goicontroller','Mycontroller@xinchao');

Route::get('controller/{ten}','Mycontroller@thamso');

//
Auth::routes();

//goi / home gọi đến home controller. phân biệt phuowg thức và controler bang dau @ . trước @ là phuong thuc, sau @là controller
Route::get('/home', 'HomeController@index')->name('home');
