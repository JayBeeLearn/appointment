<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home Page 
Route::get('/', [RegisterController::class, 'index'])->name('home');

//Registering a new user
Route::get('/auth/register', [RegisterController::class, 'create'])->name('register');
Route::post('/', [RegisterController::class, 'store'])->name('auth.store');

//Logging a user in 
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);

//Logout
Route::post('/auth', [LogoutController::class, 'index'])->name('logout');


//test route, for testing something
Route::get('create', [LogoutController::class, 'external'])->name('create');

//Profile Routes 
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/show/', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::get('profile/edit/{profile}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');

// Route::get('/', [ProfileController::class, 'store'])->name('profile.store');



// Appointment Routes 
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::get('/appointment/create/{profile}', [AppointmentController::class, 'create'])->name('appointment.create');
Route::get('/appointment/personalcreate', [AppointmentController::class, 'percreate'])->name('appointment.percreate');

Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/appointment', [AppointmentController::class, 'perstore'])->name('appointment.perstore');

Route::post('/appointment/{appointment}', [AppointmentController::class, 'confirm'])->name('appointment.confirm');
Route::get('/appointment/show/{appointment}', [AppointmentController::class, 'show'])->name('appointment.show');
Route::get('/appointment/edit/{appointment}', [AppointmentController::class, 'edit'])->name('appointment.edit');
Route::put('/appointment/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
Route::delete('/appointment/{appointment}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');


Route::get('appointment/confirmation', [ConfirmationController::class, 'index'])->name('appointment.confirm');
Route::get('/confirmation/show/{confirmations}', [ConfirmationController::class, 'show'])->name('confirmation.show');
Route::get('/confirmation/edit/{confirmations}', [ConfirmationController::class, 'edit'])->name('confirmations.edit');
Route::delete('/confirmation/{confirmations}', [ConfirmationController::class, 'destroy'])->name('confirmations.destroy');

Route::put('/confirmation/{confirmations}', [ConfirmationController::class, 'update'])->name('confirmations.update');

Route::get('/meeting/create/', [ConfirmationController::class, 'meeting_create'])->name('meeting.create');
Route::post('/meeting', [ConfirmationController::class, 'store'])->name('meeting.store');






Route::get('/appointment/{appointment}', [ConfirmationController::class, 'confirm'])->name('confirm');

