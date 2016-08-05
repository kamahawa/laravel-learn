<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('study', function () {
    return "study";
});

//truyen tham so bat buoc
Route::get('study/{subject}', function ($subject) {
    return "study : $subject";
});

Route::get('study/{subject}/{time}', function ($subject, $time) {
    return "study : $subject luc $time";
});

//khong can truyen tham so
Route::get('mon-an/{tenmonan?}', function ($tenmonan = "KFC") {
    return $tenmonan;
});

//Thêm điều kiện cho các tham số để an toàn
Route::get('thongtin/{tuoi}/{ten}', function($tuoi, $ten) {
    return "Chào Bạn $ten có $tuoi tuổi";
})->where(['tuoi' => '[0-9]+', 'ten' => '[a-z][A-Z]+']);

//Truyền giá trị cho View
Route::get('ten',function () {
    $hoten = 'Truong Huy Cuong';
    return view('hello',compact('hoten'));
});

Route::get('info','WelcomeController@showInfo');

Route::get('testDinhDanh','WelcomeController@testDinhDanh');

//Tạo định danh cho route
Route::get('SaiGon',['as' => 'sg',function () {
    return 'Sai Gon dep lam!';
}]);

//Tạo nhóm route
Route::group(['prefix' => 'quanly'],function () {
    Route::get('tintuc', function () {
        echo "Đây là trang quản lý tin tức";
    });
    Route::get('thanhvien', function () {
        echo "Đây là trang quan lý thành viên";
    });
});

//return view
Route::get('shareView',function () {
    return view('layout.sub.view');
});
Route::get('shareLayout',function () {
    return view('layout.sub.layout');
});

//share biến cho toàn bộ file view
View::share('title', 'Hoc laravel 5.x');

//share biến cho các file view chỉ định
View::composer(['layout.sub.view','layout.sub.layout'], function($view) {
    $view->with('share1','file share');
});

View::composer('layout.sub.view', function($view) {
    $view->with('share2','file share 2');
});

//Kiểm tra sự tồn tại của 1 View
Route::get('ton-tai-view',function () {
    if (view()->exists('huycuong')){
        return view('huycuong');
    } else {
        return "Không Tồn Tại View";
    }
});

//goi view
Route::get('goi-master', function(){
   return view('views.sub');
});
Route::get('nhung-sub-view', function(){
    return view('views.sub');
});

//URL
Route::get('url/full', function(){
   return URL::full();
});

Route::get('url/asset', function(){
    //return URL::asset('/mystyle.css');//for laravel 4

    //return asset('/mystyle.css', true);// neu la https

    return asset('/mystyle.css');
});

Route::get('url/to',function () {
    //return URL::to('study',["Laravel","10h"],true);//neu la https thi them true
    return URL::to('study',["Laravel","10h"]);
});

//hoac dung https vs secure
Route::get('url/secure',function () {
    return secure_url('study',["Laravel","10h"]);
});





