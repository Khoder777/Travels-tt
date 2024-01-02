<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CompanyController;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use illuminate\Support\Facades\Auth;
use App\Http\Controllers\Usercontroller;

use Illuminate\Auth\Middleware\Authenticate;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::prefix('company')->middleware('auth')->group(function () {
        Route::get('/show',[CompanyController::class ,'show'])->name('company.show');
        Route::get('/add',[CompanyController::class ,'create'])->name('company.add');
        Route::post('/store',[CompanyController::class ,'store'])->name("company.create");
        Route::get('/edit/{id}',[CompanyController::class ,'edit'])->name("company.edit");
        Route::post('/update/{id}',[CompanyController::class ,'update'])->name('company.update');
        Route::get('/destroy/{id}',[CompanyController::class ,'destroy'])->name('company.destroy');
    });


Route::prefix('booking')->middleware('auth')->group(function () {
    Route::get('/show',[BookingController::class ,'show'])->name('booking.show');
    Route::get('/add',[BookingController::class ,'create'])->name('booking.add');
    Route::post('/store',[BookingController::class ,'store'])->name("booking.create");
    Route::get('/edit/{id}',[BookingController::class ,'edit'])->name("booking.edit");
    Route::post('/update/{id}',[BookingController::class ,'update'])->name('booking.update');
    Route::get('/destroy/{id}',[BookingController::class ,'destroy'])->name('booking.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('admins', AdminController::class,);
Route::get('/User', [Usercontroller::class, 'index'])->name('userindex');
Route::get('/User-show', [Usercontroller::class, 'show']);
Route::get('/User/edit', [Usercontroller::class, 'edit'])->name('edit');
Route::post('/User/update/{id}', [Usercontroller::class, 'update'])->name('updateuser');
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
Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers-search');

