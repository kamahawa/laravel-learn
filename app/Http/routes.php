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

//create table
Route::get('schema/create', function(){
    Schema::create('monhoc', function($table){
        $table->increments('id');
        $table->string('tenmonhoc');
        $table->integer('gia');
        $table->text('ghichu')->nullable();
        $table->timestamps();

    });
});

//rename table
Route::get('schema/rename', function(){
    Schema::rename('monhoc', 'mh');
});

//drop table
Route::get('schema/drop',function () {
    Schema::drop('monhoc');
});

//drop table if exits
Route::get('schema/drop-exits',function () {
    Schema::dropIfExists('monhoc');
});

//thay doi thuoc tinh 1 cot
Route::get('schema/chang-col',function () {
    Schema::table('monhoc', function($table) {
        $table->string('tenmonhoc', 100)->change();
    });
});

//drop a column
Route::get('schema/drop-col', function(){
   Schema::table('monhoc', function($table){
        $table->dropColumn('ghichu');
        //$table->dropColumn(['tenmonhoc','gia']);
   });
});

Route::get('schema/create/category',function () {
    Schema::create('category', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});

Route::get('schema/create/category_new',function () {
    Schema::create('category_new', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});

Route::get('schema/create/news',function () {
    Schema::create('news', function($table) {
        $table->increments('id');
        $table->string('title');
        $table->integer('intro');
        $table->integer('cate_id')->unsigned();
        $table->timestamps();
    });
});

Route::get('schema/create/product',function () {
    Schema::create('product', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
        $table->timestamps();
    });
});

Route::get('query/select-all', function(){
    $data = DB::table('product')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('query/select-column', function(){
    $data = DB::table('product')->select('name')->where('id',4)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('query/or-where', function(){
    $data = DB::table('product')->where('cate_id',2)->orWhere('price',50000)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('query/where', function(){
    $data = DB::table('product')->where('cate_id',2)->where('price', '>',50000)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('query/join', function(){
    $data = DB::table('news')->join('category_new','news.cate_id', '=', 'category_new.id')->select('title','name')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('model/select-all', function(){
    //$data = App\Product::all()->tojSon();
    $data = App\Product::all()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('model/select-id', function(){
    //$data = App\Product::find(5)->toArray();
    $data = App\Product::findOrFail(5)->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('model/where', function(){
    $data = App\Product::where('price', '>', 50000)->firstOrFail()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('model/raw', function(){
    $data = App\Product::whereRaw('price > ?', [50000])->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

//them du lieu
Route::get('model/insert', function(){
    $product = new App\Product;
    $product->name = 'Quần Kaki Nam';
    $product->price = 65000;
    $product->cate_id = 2;
    $product->save();

    echo 'Finish !!!';
});

Route::get('model/create', function(){
    $data = [
        'name'=>'Quần Thể Dục',
        'price'=>'45000',
        'cate_id'=>2
    ];

    App\Product::create($data);

    echo 'Finish !!!';
});

//update
Route::get('model/update', function(){

    $product = App\Product::find(9);
    $product->price = 50000;
    $product->save();


    echo 'Finish Update !!!';
});

//delete
Route::get('model/delete', function(){

    App\Product::destroy(9);

    echo 'Finish Delete !!!';
});

Route::get('relation/one-many-1', function(){
    $data = App\Product::find(5)->images()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('relation/one-many-2', function(){
    $data = App\Images::find(7)->product()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('form/layout', function(){
    return view('form.layout');
});

Route::post('form/data', ['as' => 'sendEmail', function(){
    return 'ok';
}]);

Route::get('form/dang-ky', function(){
    return view('form.them');
});

Route::post('form/dang-ky-mon-hoc', ['as' => 'postDangKy', 'uses' => 'MonHocController@them']);

//them ky tu bat ky tren link, se chuyen ve trang chu
//Route::any('{all?}','WelcomeController@index')->where('all','.*');

Route::get('reponse/json', function(){
    $arr = array(
        'trungtam' => 'Khoa Pham Training',
        'monhoc' => 'Lap Trinh Laravel',
        'giangvien' => 'Vu Quoc Tuan'
    );
    return Response::json($arr);
});

Route::get('response/xml', function () {
    $content = '<?xml version="1.0" encoding="UTF-8"?>
    <root>
        <trungtam>Khoa Phạm</trungtam>
        <danhsach>
            <monhoc>Lập Trình Laravel</monhoc>
            <monhoc>Lập Trình Swift</monhoc>
        </danhsach>
    </root>';
    $status = 200;
    $value = 'text/xml';
    return response($content, $status)
        ->header('Content-Type', $value);
});

Route::get('response/redirect', function ()
{
    return redirect('/');
});

Route::get('response/download', function ()
{
    $url = 'public/download/demo.rar';
    return Response::download($url);
});

Route::get('response/downloadAndDelete', function ()
{
    $url = 'public/download/demo.rar';
    return Response::download($url)->deleteFileAfterSend(true);
});

Route::get('response/macro/cap', function(){
    return response()->cap('Truong Huy Cuong');
});

Route::get('response/macro/contact', function(){
    return response()->input('#');
});

Route::get('authen/login', ['as'=>'getLogin', 'uses' => 'ThanhVienController@getLogin']);
Route::post('authen/login', ['as'=>'postLogin', 'uses' => 'ThanhVienController@postLogin']);

Route::get('authentication/getRegister', ['as' => 'getRegister', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('authentication/postRegister', ['as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('authentication/getlogin', ['as' => 'getlogin', 'uses' => 'Auth\AuthController@getlogin']);
Route::post('authentication/postLogin', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('authentication/demo', function(){
    return view('views.layout');
});

Route::resource('hocsinh','HocSinhController');









Route::auth();

Route::get('/home', 'HomeController@index');
