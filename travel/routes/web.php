<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RateController;






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

//city
Route::prefix('/Cityform')->middleware('auth')->group(function () {
    Route::get('/City',[\App\Http\Controllers\CityController::class,'index'])->name('City.index');
    Route::get('/City/add',[\App\Http\Controllers\CityController::class,'create'])->name('City.create');
    Route::post('/City/store',[\App\Http\Controllers\CityController::class,'store'])->name('City.store');
    Route::get('city/edit/{id}',[\App\Http\Controllers\CityController::class,'edit'])->name('City.edit');
    Route::post('/City/update/{id}',[\App\Http\Controllers\CityController::class,'update'])->name('City.update');
    Route::get('city/delete/{id}',[\App\Http\Controllers\CityController::class,'destroy'])->name('form.destroy');



});
//hotel
Route::prefix('/Hotelform')->middleware('auth')->group(function () {
    Route::get('/Hotel',[\App\Http\Controllers\HotelController::class,'index'])->name('hotel.index');;
    Route::get('/Hotel/add',[\App\Http\Controllers\HotelController::class,'create'])->name('hotel.create');
    Route::post('/Hotel/store',[\App\Http\Controllers\HotelController::class,'store'])->name('hotel.store');
    Route::get('Hotel/edit/{id}',[\App\Http\Controllers\HotelController::class,'edit'])->name('hotel.edit');
    Route::post('/Hotel/update/{id}',[\App\Http\Controllers\HotelController::class,'update'])->name('hotel.update');
    Route::get('Hotel/delete/{id}',[\App\Http\Controllers\HotelController::class,'destroy'])->name('form.destroy');
});
//ticket

Route::prefix('/Ticketform')->middleware('auth')->group(function () {
    Route::get('/Ticket',[TicketController::class,'index'])->name('ticket.index');;
    Route::get('/Ticket/add',[TicketController::class,'create'])->name('ticket.create');
    Route::post('/Ticket/store',[TicketController::class,'store'])->name('ticket.store');
    Route::get('Ticket/edit/{id}',[TicketController::class,'edit'])->name('ticket.edit');
    Route::post('/Ticket/update/{id}',[TicketController::class,'update'])->name('ticket.update');
    Route::get('Ticket/delete/{id}',[TicketController::class,'destroy'])->name('form.destroy');
});



//rateing
Route::prefix('/Rateform')->middleware('auth')->group(function () {
    Route::get('/Rate',[RateController::class ,'index'])->name('Rate.index');
    Route::get('Rate/add',[RateController::class ,'create'])->name('Rate.add');
    Route::post('Rate/store',[RateController::class ,'store'])->name("Rate.create");
    Route::get('Rate/edit/{id}',[RateController::class ,'edit'])->name("Rate.edit");
    Route::post('Rate/update/{id}',[RateController::class ,'update'])->name('Rate.update');
    Route::get('Rate/destroy/{id}',[RateController::class ,'destroy'])->name('Rate.destroy');
});
