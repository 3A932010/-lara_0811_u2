<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
/*
//設定Route回應view
Route::get('/', function () {
    return view('welcome');
});
*/

//設定 Route 回傳字串
Route::get('/', function () {
    return 'welcome';
});

Route::get('r2', function() {
    return view('welcome');
});

//設定Route跳轉路由
Route::get('r1', function() {
    return redirect('r2');
});


//修改 Route 接受參數
//Route::get('hello/{name}', function ($name){
//修改參數成選擇性
Route::get('hello/{name?}', function ($name = 'Everybody'){
    return 'Hello, '.$name;
})->name('hello.index');//將 Route 取名為 hello.index


//3.增加新的 Route
Route::get('test', function (){
    return 'test';
});


//5-1.設定 dashboard 路徑的 Route
Route::get('dashboard', function (){
    return 'dashboard';
});

//5-2.設定另一個 Route 以群組包起來設定 prefix
Route::group(['prefix' => 'admin'], function(){
    Route::get('dashboard', function (){
        return 'admin dashboard';
    });
});

//
Route::get('home', [HomeController::class, 'index'])->name('home.index');
