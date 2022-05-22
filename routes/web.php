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
