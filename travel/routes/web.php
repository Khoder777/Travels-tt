<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CompanyController;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
