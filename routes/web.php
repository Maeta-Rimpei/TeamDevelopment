<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::post('/user_register', [App\Http\Controllers\ProfileController::class, 'userRegister'])->name('user_register');
Route::get('/user_create', [App\Http\Controllers\ProfileController::class, 'create'])->name('user_create');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//プロフィール編集画面表示
Route::get('/myprofile', [App\Http\Controllers\EditProfileController::class, 'show'])->name('profile');
//プロフィール編集
Route::post('/profile_edit', [App\Http\Controllers\EditProfileController::class, 'profileUpdate'])->name('profile_edit');
// 退会機能
Route::resource('EditProfile','EditProfileController',['only'=>['destroy']]); //destroyを追記
Route::get('/delete',[App\Http\Controllers\EditProfileController::class, 'delete_confirm'])->name('delete_confirm'); //警告画面に移動
//パスワード編集
Route::group(['middleware'=>'auth'],function(){
    //中略
            Route::get('/password/change', [App\Http\Controllers\EditProfileController::class, 'editpassword'])->name('password.form');
            Route::put('/password/change', [App\Http\Controllers\EditProfileController::class, 'changepassword'])->name('password.change');
        });