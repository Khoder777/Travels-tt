<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use illuminate\Support\Facades\Auth;
use App\Http\Controllers\Usercontroller;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('admins', AdminController::class,);
Route::get('/User', [Usercontroller::class, 'index'])->name('userindex');
Route::get('/User-show', [Usercontroller::class, 'show']);
Route::get('/User/edit', [Usercontroller::class, 'edit'])->name('edit');
Route::post('/User/update/{id}', [Usercontroller::class, 'update'])->name('update');
Route::get('/User/editpass',  function () {
    return view('users/user-pass');})->name('editpass');
Route::post('/User/pass', [Usercontroller::class, 'pass'])->name('update-pass');


Route::get('/customer', [CustomerController::class, 'index'])->name('index');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('update');
Route::get('/customer/confirm/{id}', [CustomerController::class, 'confirm'])->name('confirm');
Route::post('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('destroy');
Route::get('/customer/create/', [CustomerController::class, 'create'])->name('create');
Route::post('/customer/store/', [CustomerController::class, 'store'])->name('store');