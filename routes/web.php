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

    Route::get('/worktime',[WorktimeController::class,'index'])->name('user.worktimes.index');

    Route::get('/worktime/create',[WorktimeController::class,'create'])->name('user.worktimes.create');
    Route::post('/worktime/create',[WorktimeController::class,'store']);

    Route::delete('/worktime/delete/{worktime_id}',[WorktimeController::class,'destroy'])->name('user.worktimes.destroy');
});

Route::group(['middleware'=> 'auth','is_admin'],function () {
    Route::get('admin',[AdminController::class,'index'])->name('admin');
    Route::get('/user',[UserController::class,'index'])->name('admin.user.index');
    Route::get('/user/create',[UserController::class,'create'])->name('admin.user.create');
    Route::post('/user/create',[UserController::class,'store'])->name('admin.user.store');
    Route::delete('/user/delete/{user_id}',[UserController::class,'destroy'])->name('admin.user.destroy');

    Route::get('/user/{user_id}',[adminWorktimeController::class,'index'])->name('admin.user.timework');
    Route::get('/user/{user_id}/search',[adminWorktimeController::class,'search'])->name('admin.user.search');

});

require __DIR__.'/auth.php';
