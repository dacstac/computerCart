<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Route::middleware(['admin'])->group(function () {
    Route::get('/create-users', [UserController::class, 'create'])->name('createUsers');
    Route::post('/create-users/store', [UserController::class, 'store'])->name('storeUsers');
    Route::get('/show-users', [UserController::class, 'show'])->name('showUsers');
    Route::post('/show-users/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::get('/datatable/getUsers', [DatatableController::class, 'getUsers'])->name('getUsers');
});
Route::get('/login', [AuthController::class, 'index'])->name('startLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/recognize', [AuthController::class, 'login'])->name('login');
Route::post('/login/createAccount', [ProfileController::class, 'createAccount'])->name('createAccount');
