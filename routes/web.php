<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Auth;
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

Route::get('/', [Controller::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'login'])->name('profile');
});
Route::get('/login', [AuthController::class, 'index'])->name('startLogin');
Route::post('/login/recognize', [AuthController::class, 'login'])->name('login');
Route::post('/login/createAccount', [AuthController::class, 'createAccount'])->name('createAccount');
