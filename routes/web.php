<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('layout.main');
})->name('home');

Route::get('/register-form', [AuthController::class, 'RegisterUser'])->name('auth.register')->middleware('guest');
Route::post('/User-registration', [AuthController::class, 'UserRegistration'])->name('register')->middleware('guest');

Route::get('/login-form', [AuthController::class, 'LoginUser'])->name('auth.login')->middleware('guest');
Route::post('/User-login', [AuthController::class, 'UserLogin'])->name('login')->middleware('guest');

Route::post('/logout-user', [AuthController::class, 'logoutUser'])->name('logout-user')->middleware('auth');

//EMAIL VERIFICATION
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify');