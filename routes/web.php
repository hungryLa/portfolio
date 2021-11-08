<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
use App\Http\Controllers\HomeController;
Route::get('/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\Auth\LoginController;
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\MainController;
Route::get('/',[MainController::class,'main'])->name('main.page');

use App\Http\Controllers\UserController;
Route::get('/{slug}',[UserController::class,'index'])->name('user.page');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/{slug}/edit',[UserController::class,'edit'])->name('user.edit');
    Route::post('/{slug}/edit',[UserController::class,'update'])->name('user.update');
});


