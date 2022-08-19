<?php


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\CatatanController;


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



// Catatan Perjalanan

Route::get('/catatan', [CatatanController::class, 'index']);

Route::get('/create-catatan', [CatatanController::class, 'create']);
Route::post('/save-catatan', [CatatanController::class, 'store'])->name('simpan-kelas');

Route::get('/edit-catatan/{id}', [CatatanController::class, 'edit']);
Route::put('update-catatan/{id}', [CatatanController::class, 'update'])->name('update-kelas');

Route::get('/delete-catatan/{id}', [CatatanController::class, 'destroy']);

// Route Login
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

