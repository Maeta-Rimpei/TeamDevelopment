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
    Route::get('/group_show', [App\Http\Controllers\GroupController::class, 'show'])->name('show');
// グループ作成画面
    Route::get('/group_showcreate', [App\Http\Controllers\GroupController::class, 'showCreate'])->name('showCreate');
// グループ作成
    Route::post('/group_execreate', [App\Http\Controllers\GroupController::class, 'exeCreate'])->name('exeCreate');
// グループ詳細画面表示
    Route::get('/group/{id}', [App\Http\Controllers\GroupController::class, 'showDetail'])->name('showDetail');

// -----------------------------------------------------------------------------------------------------------
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
