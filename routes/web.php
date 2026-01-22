<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubscribeController;
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
Route::get('/front_glry',[HomeController::class,'front_gallery']);
Route::view('/blog','Frontend/blog');
Route::view('/contact','Frontend/contact');
// Customer logged in
Route::middleware(['auth','customer'])->group(function(){
    Route::get('/customer',[CustomerController::class,'index']);
    Route::get('/change_user_info',[CustomerController::class,'ch_us_info']);
    // Booking
    Route::get('/book/{id}',[CustomerController::class,'book']);
    Route::post('/submit_book',[CustomerController::class,'submit_book']);
    // My Account
    Route::get('acount',[CustomerController::class,'acount']);
    Route::get('edit_booking/{id}',[CustomerController::class,'edit_booking']);
    Route::post('update_book/{id}',[CustomerController::class,'update_book']);
    // Cancel Booking
    Route::post('/cancel_booking/{id}',[CustomerController::class,'cancel_booking']);
    // Subscribe
    Route::post('subscribe',[SubscribeController::class,'index']);
});

// Admin Logged in
Route::middleware(['auth','admin'])->group(function(){
    Route::resource('/hotel',HotelController::class);
    Route::resource('/room',RoomController::class);
    Route::get('/admin',[AdminController::class,'index']);
    Route::post('approve_book/{id}',[AdminController::class,'approve']);
    Route::post('/reject/{id}',[AdminController::class,'rejected_book']);
    Route::get('/reservations',[AdminController::class,'reservations']);
    Route::post("/accept_reject",[AdminController::class,'accept_reject']);
    // Reservation's date
    Route::get('/week_reservation',[AdminController::class,'week_reservation']);
    Route::get('/month_reservation',[AdminController::class,'month_reservation']);
    // Rejected reservations
    Route::get('/rejected_reservation',[AdminController::class,'rejected_reservations']);

    // Gallery Part
    Route::resource('/glry',GalleryController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
