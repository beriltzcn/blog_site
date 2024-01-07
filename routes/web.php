<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\Homepage;
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



Route::any('/home', [Homepage::class, 'index'])->name('homepage');

Route::any('/create_post', [Homepage::class, 'create_post']);
Route::any('/user_post', [Homepage::class, 'user_post'])->name('post.create');

Route::any('/register', [AuthController::class, 'register']);
Route::any('/register/post', [AuthController::class, 'registerPost'])->name('register');

Route::any('/login', [\App\Http\Controllers\AuthController::class, 'loginForm']);
Route::any('/login/post', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::any('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

//  Route::get('/dashboard', function () {
//      return view('dashboard');
//  })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
