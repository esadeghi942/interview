<?php

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\WorktimeController;

use App\Http\Controllers\Admin\WorktimeController as adminWorktimeController;
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

Route::group(['middleware'=>'auth'],function () {
    Route::get('/',[HomeController::class,'redirectUser'])->name('index');
    Route::get('/worktimedata',[WorktimeController::class,'data'])->name('user.worktime.data');
    Route::get('/worktime',[WorktimeController::class,'index'])->name('user.worktime.index');

    Route::get('/worktime/create',[WorktimeController::class,'create'])->name('user.worktime.create');
    Route::post('/worktime/create',[WorktimeController::class,'store']);

    Route::get('/worktime/edit/{worktime_id}',[WorktimeController::class,'edit'])->name('user.worktime.edit');
    Route::post('/worktime/edit/{worktime_id}',[WorktimeController::class,'update']);

    Route::get('/worktime/delete/{worktime_id}',[WorktimeController::class,'destroy'])->name('user.worktime.delete');

});

Route::group(['middleware'=>'is_admin'],function () {
    Route::get('admin',[AdminController::class,'index'])->name('admin');
    Route::get('/user',[UserController::class,'index'])->name('admin.user.index');
    Route::get('/userdata',[UserController::class,'data'])->name('admin.user.data');
    Route::get('/user/create',[UserController::class,'create'])->name('admin.user.create');
    Route::post('/user/create',[UserController::class,'store']);
});

require __DIR__.'/auth.php';
