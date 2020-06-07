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

Route::get('/', function () {
    // return view('welcome');
    return view('top');
});


// テストルーティング
Route::get('tests/test', 'CommentController@test');


// 認証機能のルーティング
Auth::routes();

// デフォであるやつ
Route::get('/home', 'HomeController@index')->name('home');



// 部分的リソースルートの例
// Route::resource('userinfos', 'UserInfoController')->only([
//     'index', 'show'
// ]);





Route::group(['prefix'=>'userinfo', 'middleware' => 'auth'], function(){
    Route::get('index', 'UserInfoController@index')->name('userinfo.index'); 
    Route::get('create', 'UserInfoController@create')->name('userinfo.create');
    Route::post('store', 'UserInfoController@store')->name('userinfo.store');
    Route::get('show/{id}', 'UserInfoController@show')->name('userinfo.show');
    Route::get('originalshow/{id}', 'UserInfoController@originalshow')->name('userinfo.originalshow');
    Route::get('edit/{id}', 'UserInfoController@edit')->name('userinfo.edit');
    Route::post('update/{id}', 'UserInfoController@update')->name('userinfo.update');
    Route::post('destroy/{id}', 'UserInfoController@destroy')->name('userinfo.destroy'); 
});


Route::post('student/store', 'StudentController@store')->name('student.store');