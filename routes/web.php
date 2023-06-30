<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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
})->name('home');

// User registration routes
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Admin CRUD routes
Route::middleware('auth')->group(function () {  
    Route::resource('admin/users', AdminUserController::class);
    Route::post('admin/users/{user}/approve', [AdminUserController::class, 'approve'])->name('admin.users.approve');
    Route::post('admin/users/{user}/disapprove', [AdminUserController::class, 'disapprove'])->name('admin.users.disapprove');
    Route::delete('admin/users/{user}/soft-delete', [AdminUserController::class, 'softDelete'])->name('admin.users.soft-delete');
});

// User Login and Logout Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Update the 
Route::post('/login', [LoginController::class, 'login']); // Update the route definition
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

