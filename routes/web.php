<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;


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

Route::get('/',[CustomerController::class,'index']);

Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
// All visitors
Route::get('/about',[HomeController::class,'about']);
Route::get('/rooms',[HomeController::class,'rooms']);
Route::view('/gallery','Frontend/gallery');
Route::view('/blog','Frontend/blog');
Route::view('/contact','Frontend/contact');
// Customer logged in
Route::middleware(['auth','customer'])->group(function(){
    Route::get('/customer',[CustomerController::class,'index']);
    // Booking
    Route::post('/book_now',[CustomerController::class,'book_now']);
    Route::get('/book/{id}',[CustomerController::class,'book']);
    Route::post('/submit_book',[CustomerController::class,'submit_book']);
});

// Admin Logged in
Route::middleware(['auth','admin'])->group(function(){
    Route::resource('/hotel',HotelController::class);
    Route::resource('/room',RoomController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
