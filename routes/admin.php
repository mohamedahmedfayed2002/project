<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
define('PAGINATION_COUNT',10);


Route::group([ 'namespace'=>'Admin','prefix'=>'admin','Middleware'=>'auth:admin'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
    Route::get('student',[StudentController::class,'index'])->name('students.index');
   // Route::get('student',[StudentController::class,'create'])->name('students.create');

    });






Route::group([ 'namespace'=>'Admin','prefix'=>'admin','Middleware'=>'guest:admin'],function(){
Route::get('login',[LoginController::class,'show_login_view'])->name('admin.showlogin');
Route::post('login',[LoginController::class,'login'])->name('admin.login');
});


