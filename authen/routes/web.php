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

//gọi view trong laravel
Route::get('/', function () {
    return view('welcome');
    //tra ve view welcome trong resoure->view ->welcome.blade.php
});
Auth::routes();
Route::get('/home','HomeController@index')->name('home');

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








//goi controller
Route::get('goicontroller','Mycontroller@xinchao');

Route::get('controller/{ten}','Mycontroller@thamso');

//
Auth::routes();

//goi / home gọi đến home controller. phân biệt phuowg thức và controler bang dau @ . trước @ là phuong thuc, sau @là controller
Route::get('/home', 'HomeController@index')->name('home');
