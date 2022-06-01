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
Route::post('/delete', [App\Http\Controllers\EditProfileController::class, 'delete'])->name('user.delete');
Route::get('/delete_confirm', [App\Http\Controllers\EditProfileController::class, 'delete_confirm']); //警告画面


//パスワード編集
Route::group(['middleware'=>'auth'],function(){
    //中略
            Route::get('/password/change', [App\Http\Controllers\Auth\ResetPasswordController::class, 'editpassword'])->name('password.form');
            Route::patch('/password/change', [App\Http\Controllers\Auth\ResetPasswordController::class, 'changepassword'])->name('password.change');
        });

//チャット機能
Route::get('/chat_home/{to_owners_chat}/{to_clients_chat}', [App\Http\Controllers\ChatHomeController::class, 'index'])->name('chat_home'); //チャットホーム画面
Route::get('/chat/{recieve}' , [App\Http\Controllers\ChatController::class, 'index'])->name('chat');//ユーザーごとのチャット
Route::post('/chat/send' , [App\Http\Controllers\ChatController::class, 'store'])->name('chatSend');//送信