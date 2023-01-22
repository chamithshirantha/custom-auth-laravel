<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[CustomAuthController::class, 'home']);
Route::get('login',[CustomAuthController::class, 'index'])->name('login');
Route::post('post-login',[CustomAuthController::class, 'login'])->name('post.login');
Route::get('signup',[CustomAuthController::class, 'signup'])->name('register.user');
Route::post('postsignup',[CustomAuthController::class,'signupsave'])->name('post.signup');
Route::get('dashboard',[CustomAuthController::class, 'dashboard']);
Route::get('signout',[CustomAuthController::class, 'signout'])->name('signout');