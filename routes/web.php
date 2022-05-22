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
    return view('first');
});
Route::post('/user_register', [App\Http\Controllers\ProfileController::class, 'userRegister'])->name('user_register');
Route::get('/user_create', [App\Http\Controllers\ProfileController::class, 'create'])->name('user_create');

// -----------------------------------------------グループ関連------------------------------------------------
// グループ一覧画面表示
Route::get('/group_show', [App\Http\Controllers\GroupController::class, 'groupShow'])->name('groupShow');
// グループ作成画面
Route::get('/group_showcreate', [App\Http\Controllers\GroupController::class, 'groupShowCreate'])->name('groupShowCreate');
// グループ作成
Route::post('/group_execreate', [App\Http\Controllers\GroupController::class, 'groupExeCreate'])->name('groupExeCreate');
// グループ詳細/応募一覧画面表示
Route::get('/group/{id}', [App\Http\Controllers\GroupController::class, 'groupShowDetail'])->name('groupShowDetail');
// グループ検索
Route::get('/group/search', [App\Http\Controllers\GroupController::class, 'groupSearch'])->name('groupSearch');
// -----------------------------------------------------------------------------------------------------------

// -----------------------------------------------応募関連----------------------------------------------------
// 応募機能
Route::post('/app_execreate', [App\Http\Controllers\GroupController::class, 'appExeCreate'])->name('appExeCreate');
// 応募フォーム画面表示
Route::get('/app_showcreate/{id}', [App\Http\Controllers\GroupController::class, 'appShowCreate'])->where('id', '[0-9]+')->name('appShowCreate');
// -----------------------------------------------------------------------------------------------------------
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
