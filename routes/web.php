<?php


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;

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


Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('proses_login',[AuthController::class,'proses_login'])->name('proses_login');

// auth
// auth ->admin || editor
Route::group(['middleware' => ['auth']], function () {
   Route::group(['Middleware' => ['Cek_login:admin']], function () {
    Route::get('admin',[AdminController::class,'index'])->name('admin');
   }); 

   Route::group(['Middleware' => ['Cek_login:editor']], function () {
    Route::get('editor',[EditorController::class,'index'])->name('editor');
  }); 

});

