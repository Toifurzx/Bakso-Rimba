<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('auth', [LoginController::class, 'authenticate'])->name('auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth','cek_role:kasir']], function(){
Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');
Route::get('kasir/create', [KasirController::class, 'create'])->name('kasir/create');
Route::get('kasir/delete/{id}', [KasirController::class, 'destroy'])->name('kasir/delete');
Route::post('kasir/store', [KasirController::class, 'store'])->name('kasir/store');
});

Route::group(['middleware' => ['auth','cek_role:manager']], function(){
Route::get('/manager', [MenuController::class, 'index'])->name('manager');
Route::get('manager/create', [MenuController::class, 'create'])->name('manager/create');
Route::post('manager/update', [MenuController::class, 'store'])->name('manager/store');
Route::get('manager/edit/{id}', [MenuController::class, 'edit'])->name('manager/edit');
Route::put('manager/update', [MenuController::class, 'update'])->name('manager/update');
Route::get('manager/delete/{id}', [MenuController::class, 'destroy'])->name('manager/delete');
Route::get('manager/laporan', [MenuController::class, 'laporan'])->name('manager/laporan');
});

Route::group(['middleware' => ['auth','cek_role:admin']], function(){
Route::get('/admin', [UserController::class, 'index'])->name('admin');
Route::get('admin/create', [UserController::class, 'create'])->name('admin/create');
Route::post('admin/store', [UserController::class, 'store'])->name('admin/store');
Route::get('admin/edit/{id}', [UserController::class, 'edit'])->name('admin/edit');
Route::put('admin/update', [UserController::class, 'update'])->name('admin/update');
Route::get('admin/delete/{id}', [UserController::class, 'destroy'])->name('admin/delete');
});



// require __DIR__.'/auth.php';
