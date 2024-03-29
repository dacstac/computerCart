<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('updatedataUser');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AuthController::class, 'admin'])->name('admin');
});
Route::get('/login', [AuthController::class, 'index'])->name('startLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/recognize', [AuthController::class, 'login'])->name('login');
Route::post('/login/createAccount', [AuthController::class, 'createAccount'])->name('createAccount');
